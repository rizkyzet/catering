<div>
    <table class="table table-sm table-hover table-cart overflow-auto mt-5" wire:loading.class="opacity">
        <tr>
            <th>No</th>
            <th class="text-center">Image</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Action</th>
        </tr>
        @foreach ($cart as $c)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td class="d-flex justify-content-center">
                <div class="d-flex flex-column py-2">
                    <img src="{{asset($c->attributes->foto)}}" alt="Menu Makanan" class="img-fluid"
                        style="width: 100px;object-fit:cover;object-position:center;">
                    <div class="input-group mb-3 mt-1" style="width: 100px;">
                        <div class="input-group-prepend">
                            <button wire:click="kurangCart('{{$c->id}}')" class="btn btn-sm btn-outline-primary"
                                type="button"><i class="fas fa-angle-left"></i></button>
                        </div>
                        <input type="text" class="form-control text-center" wire:model="quantityRow.{{$c->id}}"
                            value="{{$c->quantity}}">
                        <div class="input-group-prepend">
                            <button wire:click="tambahCart('{{$c->id}}')" class="btn btn-sm btn-outline-primary"
                                type="button"><i class="fas fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>

            </td>
            <td>{{$c->name}}</td>
            <td>{{$c->price}}</td>

            <td>{{$c->getPriceSum()}}</td>
            <td>
                <button class="btn btn-sm btn-danger" wire:click="deleteCart('{{$c->id}}')">
                    <i class="fas fa-times"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </table>
</div>