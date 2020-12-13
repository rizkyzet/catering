<div>
    <table class="table table-sm table-hover table-responsive-sm table-cart" wire:loading.class="opacity    ">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Menu</th>
            <th>Harga</th>
            <th class="text-center">Qty</th>
            <th>Jumlah</th>
            <th>Action</th>
        </tr>
        @foreach ($cart as $c)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td><img src="{{asset($c->attributes->foto)}}" alt="Menu Makanan"
                    style="height: 60px;object-fit:cover;object-position:center;"></td>
            <td>{{$c->name}}</td>
            <td>{{$c->price}}</td>
            <td>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-7 col-md-6 col-12">
                        <div class="input-group mb-3">
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
                </div>

            </td>
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