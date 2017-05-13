<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {{ Form::label('costumer_id', 'Nama Costumer:') }}
            <select class="form-control" name="costumer_id" @change="custSelected" v-model="costumerID">
                @foreach ($costumers as $costumer)
                    <option value="{{ $costumer->id }}">
                        {{ $costumer->costumer_name }}
                        ({{ $costumer->costumer_phone }})
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" v-text="costumer.costumer_address" disabled></textarea>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="row">
            <div class="form-group col-sm-6">
                <label>Tanggal Pemesanan</label>
                <input type="date" class="form-control">
            </div>
        </div>
    </div>
</div>
<hr>

<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th>Kode Produk</th>
            <th>Harga</th>
            <th>Berat Satuan</th>
            <th>Jumlah</th>
            <th>Berat Total</th>
            <th>Biaya Tambahan</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <select class="dropdown" @change="productSelected" v-model="productID">
                    @foreach ($products as $product)
                        <option value="{{$product->product_id}}">
                            {{ $product->product_id }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td class="table-price">
                <span class="table-text" v-text="product.product_price"></span>
            </td>
            <td class="table-weight">
                <span class="table-text" v-text="product.product_weight"></span>
            </td>
            <td class="table-qty">
                <input type="text" class="table-control" v-model="productQty">
            </td>
            <td class="table-total-weight">
                <span class="table-text">@{{ product.product_weight * productQty }}</span>
            </td>
            <td class="table-additional-cost">
                <input type="text" class="table-control" v-model="tambahan">
            </td>
            <td class="table-total">
                <span class="table-text">@{{ (product.product_price * productQty) + Number(tambahan) }}</span>
            </td>
            <td class="table-remove">
                <span class="btn btn-danger">&times;</span>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td class="table-empty" colspan="5">
                <span class="btn btn-primary">Add Line</span>
            </td>
            <td class="table-label"><strong>Sub Total</strong></td>
            <td class="table-amount"></td>
        </tr>
        <tr>
            <td class="table-empty" colspan="5"></td>
            <td class="table-label"><strong>Diskon</strong></td>
            <td class="table-amount">
                <input type="text" class="table-discount_empty">
            </td>
        </tr>
        <tr>
            <td class="table-empty" colspan="5"></td>
            <td class="table-label"><strong>Berat Order</strong></td>
            <td class="table-amount"></td>
        </tr>
        <tr>
            <td class="table-empty" colspan="5"></td>
            <td class="table-label"><strong>Grand Total</strong></td>
            <td class="table-amount"></td>
        </tr>
    </tfoot>
</table>
