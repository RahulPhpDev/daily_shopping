<div class="col s12 m12 l12">
    <div id="responsive-table" class="card card card-default scrollspy">
        <div class="card-content">
            <h4 class="card-title">Brand</h4>

            <div class="row">
                @include('livewire.admin.brand.create')

                <div class="col s12">
                    <table class="responsive-table bordered striped Highlight">


                                    <thead class="text-warning">
                                    <th>ID</th>
                                    <th>Name </th>
                                    <th> Delete </th>
                                    </thead>
                                    <tbody>
                                    @forelse($brands as $brand)
                                        <tr>
                                            <td> {{ $brand->id }} </td>
                                            <td> {{ $brand->name }} </td>
                                            <td>
                                                <button  class="waves-effect waves-light btn gradient-45deg-light-blue-cyan z-depth-4" wire:click="delete({{ $brand->id }})">
                                                    Delete

                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                           <td colspan="2"> No record found</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                    {{ $brands->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
