<div>
    <div>
        <h1>Facturacion Malu Restaurante</h1>
    </div>

    <div>

        <div>
            <b class="subtitle">RFC</b>
            <p class="text">{{$invoices->RFC}}</p>
            <b class="subtitle">Empresa</b>
            <p class="text">{{$invoices->business_name}}</p>
            <b class="subtitle">ciudad y estado</b>
            <p class="text"> {{$invoices->citie}},{{$invoices->state}} </p>
            <b class="subtitle">Dirección</b>
            <p class="text">{{$invoices->address}}, CP.{{$invoices->CP}} </p>
            <b class="subtitle">Teléfono</b>
            <p class="text">{{$invoices->phone}}</p>
            <b class="subtitle">Correo Electronico</b>
            <p class="text">{{$invoices->email}}</p>
        </div>

    </div>