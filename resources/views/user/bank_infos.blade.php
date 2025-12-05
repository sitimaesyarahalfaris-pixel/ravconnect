@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Bank & E-Wallet Info</h2>
    <div class="mb-6">
        <form method="POST" action="{{ route('user.bank_infos.store') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label>Bank/E-Wallet</label>
                    <select name="bank_code" required>
                        <option value="">Select Bank/E-Wallet</option>
                        {{-- TODO: Populate with AtlanticH2H API bank list --}}
                    </select>
                </div>
                <div>
                    <label>Bank/E-Wallet Name</label>
                    <input type="text" name="bank_name" required />
                </div>
                <div>
                    <label>Account Number</label>
                    <input type="text" name="account_number" required />
                </div>
                <div>
                    <label>Account Holder</label>
                    <input type="text" name="account_holder" required />
                </div>
                <div>
                    <label>Type</label>
                    <select name="type" required>
                        <option value="bank">Bank</option>
                        <option value="ewallet">E-Wallet</option>
                    </select>
                </div>
                <div>
                    <label>Email (optional)</label>
                    <input type="email" name="email" />
                </div>
                <div>
                    <label>Phone (optional)</label>
                    <input type="text" name="phone" />
                </div>
                <div class="col-span-2">
                    <label>Note (optional)</label>
                    <textarea name="note"></textarea>
                </div>
            </div>
            <button type="submit" class="mt-4 btn btn-primary">Add Bank/E-Wallet Info</button>
        </form>
    </div>
    <h3 class="text-xl font-semibold mb-2">Your Saved Bank/E-Wallet Infos</h3>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Bank/E-Wallet</th>
                <th>Account Number</th>
                <th>Account Holder</th>
                <th>Type</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bankInfos as $info)
            <tr>
                <td>{{ $info->bank_name }}</td>
                <td>{{ $info->account_number }}</td>
                <td>{{ $info->account_holder }}</td>
                <td>{{ $info->type }}</td>
                <td>{{ $info->email }}</td>
                <td>{{ $info->phone }}</td>
                <td>{{ $info->note }}</td>
                <td>
                    <form method="POST" action="{{ route('user.bank_infos.destroy', $info->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    {{-- TODO: Add edit functionality --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
