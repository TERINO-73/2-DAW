import { Component } from '@angular/core';
import { Factura } from '../../model/factura';
import { PAJAXService } from '../../services/p-ajax.service';
import { Router } from '@angular/router';

@Component({
    selector: 'app-principal',
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
