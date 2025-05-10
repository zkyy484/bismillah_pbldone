@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-semibold mb-6">Dashboard</h2>

        <!-- Cards Section -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Total Produk -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total Produk</p>
                        <p class="text-2xl font-bold">120</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-box text-blue-500"></i>
                    </div>
                </div>
            </div>

            <!-- Total Kategori -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total Kategori</p>
                        <p class="text-2xl font-bold">15</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-tags text-green-500"></i>
                    </div>
                </div>
            </div>

            <!-- Total Pesanan -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total Pesanan</p>
                        <p class="text-2xl font-bold">56</p>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-file-invoice text-yellow-500"></i>
                    </div>
                </div>
            </div>

            <!-- Total Ulasan -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total Ulasan</p>
                        <p class="text-2xl font-bold">42</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-star text-purple-500"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Last Order & List Product Section -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Last Order -->
                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                    <h3 class="text-lg font-semibold mb-4">Last Order</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Member</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-4 py-3 font-medium text-gray-900">Lorem Ipsum</td>
                                    <td class="px-4 py-3 text-gray-500">Micronolis</td>
                                    <td class="px-4 py-3 text-gray-500">23 March 2025</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-medium text-gray-900">Lorem Ipsum</td>
                                    <td class="px-4 py-3 text-gray-500">Kentampercer</td>
                                    <td class="px-4 py-3 text-gray-500">23 March 2025</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-medium text-gray-900">Lorem Ipsum</td>
                                    <td class="px-4 py-3 text-gray-500">Moslem Closiris</td>
                                    <td class="px-4 py-3 text-gray-500">23 March 2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- List Product -->
                <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                    <h3 class="text-lg font-semibold mb-4">List Product</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name Produk</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-4 py-3 text-gray-900">Nama Produk</td>
                                    <td class="px-4 py-3 text-gray-500">Kategori</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-gray-900">Nama Produk</td>
                                    <td class="px-4 py-3 text-gray-500">Kategori</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ulasan dan Rating Section -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Ulasan dan Rating</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Comment</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rating</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4">Comment</td>
                            <td class="px-6 py-4">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Published</span>
                            </td>
                            <td class="px-6 py-4">23 March 2025</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">Comment</td>
                            <td class="px-6 py-4">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                            </td>
                            <td class="px-6 py-4">22 March 2025</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">Comment</td>
                            <td class="px-6 py-4">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Published</span>
                            </td>
                            <td class="px-6 py-4">21 March 2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                nama_category: {
                    required : true,
                }, 
                
            },
            messages :{
                nama_category: {
                    required : 'Tolong isi kategori',
                }, 
                 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
@endsection
