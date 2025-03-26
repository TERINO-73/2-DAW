import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Factura } from '../model/factura';
import { Detalle } from '../model/detalle';

@Injectable({
    providedIn: 'root'
})
export class PAJAXService {
    private url: string = "http://localhost/facturasAngular/servidor.php"

    constructor(private http: HttpClient) { }

    listar() {
        let pAJAX = JSON.stringify({ servicio: "facturas" });

        return this.http.post<Factura[]>(this.url, pAJAX);
    }

    detalle(id: number) {
        let pAJAX = JSON.stringify({ servicio: "detalle", id: id });

        return this.http.post<Detalle[]>(this.url, pAJAX);
    }

    insertarDetalle(detalle: Detalle, id_factura: number, cantidad: number, concepto: string, precio: number, tipo_iva: number) {
        let pAJAX = JSON.stringify({
            servicio: "anade",
            detalle: detalle,
            id_factura: id_factura,
            cantidad: cantidad,
            concepto: concepto,
            precio: precio,
            tipo_iva: tipo_iva
        });

        return this.http.post<Detalle[]>(this.url, pAJAX);
    }

    borrarDetalle(detalleId: number, facturaId: number) {
        let pAJAX = JSON.stringify({ servicio: "borra", id: detalleId, id_factura: facturaId });

        return this.http.post<Detalle[]>(this.url, pAJAX);
    }

    editarDetalle(detalle: Detalle, id_factura: number, cantidad: number, concepto: string, precio: number, tipo_iva: number) {
        let pAJAX = JSON.stringify({
            servicio: "modificaDetalle",
            detalle: detalle,
            id_factura: id_factura,
            cantidad: cantidad,
            concepto: concepto,
            precio: precio,
            tipo_iva: tipo_iva
        });

        return this.http.post<Detalle[]>(this.url, pAJAX);
    }
}
