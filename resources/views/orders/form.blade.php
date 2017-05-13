<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {{ Form::label('costumer_id', 'Nama Costumer:') }}
            <select class="form-control" name="costumer_id">
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
            <textarea class="form-control"></textarea>
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

<table class="table table-bordered table-form">
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
            <td class="table-name">
                <select class="table-control" name="product_id">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->product_id }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td class="table-price">
                <input type="text" class="table-control" disabled>
            </td>
            <td class="table-weight">
                <input type="text" class="table-control" disabled>
            </td>
            <td class="table-qty">
                <input type="text" class="table-control">
            </td>
            <td class="table-total-weight">
                <span class="table-text"></span>
            </td>
            <td class="table-additional-cost">
                <input type="text" class="table-control">
            </td>
            <td class="table-total">
                <span class="table-text"></span>
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
