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
        <tr v-for="(row, index) in rows">
            <td>
                <select class="dropdown" @change="productSelected(index)" v-model="row.productID">
                    @foreach ($products as $product)
                        <option value="{{$product->product_id}}">
                            {{ $product->product_id }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td>
                <span class="table-text">@{{ "Rp " + (row.price = row.product.product_price)}}</span>
            </td>
            <td>
                <span class="table-text">@{{ (row.weight = row.product.product_weight) + " gr"}}</span>
            </td>
            <td>
                <input type="text" class="table-control" v-model="row.qty">
            </td>
            <td>
                <span class="table-text">@{{ row.totalWeight = (Number(row.product.product_weight * row.qty/1000).toFixed(2)) + " Kg" }}</span>
            </td>
            <td>
                <input type="text" class="table-control" v-model="row.addCost">
            </td>
            <td>
                <span class="table-text"><strong>@{{ row.totalPrice = row.price * row.qty + row.addCost }}</strong></span>
            </td>
            <td>
                <span class="btn btn-danger" @click="delRow(index)">&times;</span>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td class="table-empty" colspan="5">
                <span class="btn btn-primary" @click="addRow">Tambah Data</span>
            </td>
            <td class="table-label"><strong>Sub Total</strong></td>
            <td class="table-amount">
                <span class="text-primary"><strong>@{{ "Rp " + subTotal.toFixed(2).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,") }}</strong></span>
            </td>
        </tr>
        <tr>
            <td class="table-empty" colspan="5"></td>
            <td class="table-label"><strong>Diskon</strong></td>
            <td class="table-amount">
                <input type="text" class="table-discount_empty" v-model="diskon">
            </td>
        </tr>
        <tr>
            <td class="table-empty" colspan="5"></td>
            <td class="table-label"><strong>Berat Order</strong></td>
            <td class="table-amount">
                <span class="text-danger"><strong>@{{ beratOrder.toFixed(2).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,") + " Kg"}}</strong></span>
            </td>
        </tr>
        <tr>
            <td class="table-empty" colspan="5"></td>
            <td class="table-label"><strong>Grand Total</strong></td>
            <td class="table-amount">
                <span class="text-success"><strong>@{{ "Rp " + (subTotal - diskon).toFixed(2).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,") }}</strong></span>
            </td>
        </tr>
    </tfoot>
</table>
