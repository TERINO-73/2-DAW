import { Component } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { Factura } from '../../model/factura';
import { PAJAXService } from '../../services/p-ajax.service';

@Component({
    selector: 'app-principal',
    standalone: true,
    imports: [RouterLink],
    templateUrl: './principal.component.html',
    styleUrl: './principal.component.css'
})
export class PrincipalComponent {
    public listaFacturas: Factura[] = [];

    constructor(private pAJAX: PAJAXService, private ruta: Router) {
        this.pAJAX.listar().subscribe(facturas => {
            this.listaFacturas = facturas;
        })
    }
}
