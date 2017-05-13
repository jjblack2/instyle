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
            <th>Banyak</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="table-name">
                <textarea class="table-control"></textarea>
            </td>
            <td class="table-price">
                <input type="text" class="table-control">
            </td>
            <td class="table-qty">
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
            <td class="table-empty" colspan="2">
                <span class="btn btn-primary">Add Line</span>
            </td>
            <td class="table-label">Sub Total</td>
            <td class="table-amount"></td>
        </tr>
        <tr>
            <td class="table-empty" colspan="2"></td>
            <td class="table-label">Discount</td>
            <td class="table-amount">
                <input type="text" class="table-discount_empty">
            </td>
        </tr>
        <tr>
            <td class="table-empty" colspan="2"></td>
            <td class="table-label">Grand Total</td>
            <td class="table-amount"></td>
        </tr>
    </tfoot>
</table>
