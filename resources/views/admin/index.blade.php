@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
    <!-- Header -->
    <header class=" mx-auto px-4">
    
        <div class="bg-white shadow max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">Admin Dashboard</h1>
            <div class="text-sm text-gray-600">
                Welcome, {{ auth()->guard('admin')->user()->name }}
            </div>
        </div>
    </header>

    <!-- Main -->
    <main class="max-w-7xl mx-auto px-4 py-6">
        <!-- Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-5 rounded shadow">
                <p class="text-sm text-gray-500">Users</p>
                <p class="text-2xl font-bold">1,245</p>
            </div>

            <div class="bg-white p-5 rounded shadow">
                <p class="text-sm text-gray-500">Orders</p>
                <p class="text-2xl font-bold">312</p>
            </div>

            <div class="bg-white p-5 rounded shadow">
                <p class="text-sm text-gray-500">Revenue</p>
                <p class="text-2xl font-bold">$18,450</p>
            </div>

            <div class="bg-white p-5 rounded shadow">
                <p class="text-sm text-gray-500">Pending Tickets</p>
                <p class="text-2xl font-bold">9</p>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Activity -->
            <div class="lg:col-span-2 bg-white rounded shadow p-6">
                <h2 class="text-lg font-semibold mb-4">Recent Activity</h2>
                <ul class="divide-y">
                    <li class="py-3">New user registered</li>
                    <li class="py-3">Order #1234 completed</li>
                    <li class="py-3">Password reset requested</li>
                </ul>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded shadow p-6">
                <h2 class="text-lg font-semibold mb-4">Quick Actions</h2>
                <div class="space-y-3">
                    <a href="#" class="block w-full text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Add User
                    </a>
                    <a href="#" class="block w-full text-center bg-green-600 text-white py-2 rounded hover:bg-green-700">
                        Create Report
                    </a>
                    <a href="#" class="block w-full text-center bg-gray-700 text-white py-2 rounded hover:bg-gray-800">
                        Settings
                    </a>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
