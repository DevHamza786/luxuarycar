<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $pagePrefix = 'users';

        return view('users.index', compact('pagePrefix'));
    }

    public function allusers(Request $request)
    {
        $users = User::role('customer')->withCount('userRides');

        // Apply search filter if search query is provided
        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $searchValue = $request->input('search')['value'];
            $users->where(function ($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('email', 'like', '%' . $searchValue . '%')
                    ->orWhere('phone', 'like', '%' . $searchValue . '%');
            });
        }
        return DataTables::of($users)
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('email', function ($row) {
                return $row->email;
            })
            ->addColumn('phone', function ($row) {
                return $row->phone ?? 'N/A';
            })
            ->editColumn('user_rides_count', function ($row) {
                return $row->user_rides_count ?? 'N/A';
            })
            ->editColumn('status', function ($row) {
                return $row->status ?? 'Active';
            })
            ->addColumn('action', function ($row) {
                // $actionBtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm show-user-details"  data-user-id="' . $row->id . '">
                // <span class="svg-icon svg-icon-3" style="margin-right:0px;"><i class="fa fa-eye" aria-hidden="true" style="padding-right:0px !important;"></i>
                // </i>
                // </span>
            // </a>';
                $actionBtn = '&nbsp;&nbsp;<a href="' . route('user.delete', ['id' => $row->id]) . '" class="delete btn btn-danger btn-sm">
                <span class="svg-icon svg-icon-3" style="margin-right:0px;"><i class="fa fa-trash" aria-hidden="true" style="padding-right:0px !important;"></i>
                </span>
            </a>';
                return $actionBtn;
            })
            ->rawColumns(['action','status'])
            ->make(true);
    }

    public function userStatus(Request $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        $user->update([
            'status' => strtolower($request->status),
        ]);

        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }

    public function softDelete($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Soft delete the user
        $user->delete();

        // Optionally, you can redirect back with a success message
        session()->flash('success', 'User is deleted successfully');

        // Redirect back
        return redirect()->back();
    }
}
