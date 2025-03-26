import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Factura } from '../model/factura';
import { Detalle } from '../model/detalle';

@Injectable({
    providedIn: 'root'
})
export class PAJAXService {
    private url: string = "http://localhost/serviciosWeb/facturas/servidor.php"

    constructor(private http: HttpClient) { }

    listar() {
        let pAJAX = JSON.stringify({ servicio: "facturas" });

        return this.http.post<Factura[]>(this.url, pAJAX);
    }

    detalle(id: number) {
        let pAJAX = JSON.stringify({ servicio: "detalle", id: id });
        return this.http.post<Detalle[]>(this.url, pAJAX);
    }

    insertarDetalle(detalle: Detalle) {
        console.log("Detalle ser:",detalle);
        let pAJAX = JSON.stringify({
            servicio: "anade",
            detalle: detalle,
            id_factura: detalle.id_factura,
            cantidad: detalle.cantidad,
            concepto: detalle.concepto,
            precio: detalle.precio,
            tipo_iva: detalle.tipo_iva
        });

        return this.http.post<Detalle[]>(this.url, pAJAX);
    }

    borrarDetalle(detalleId: number, facturaId: number) {
        let pAJAX = JSON.stringify({ servicio: "borra", id: detalleId, id_factura: facturaId });

        return this.http.post<Detalle[]>(this.url, pAJAX);
    }

    editarDetalle(detalle: Detalle) {
        let pAJAX = JSON.stringify({
            servicio: "modifica",
            detalle
        });

        console.log("PAXA:",pAJAX);


        return this.http.post<Detalle[]>(this.url, pAJAX);
    }

    selPersona(id:number){
        let pa = JSON.stringify({servicio: "selPersonaID", id:id,});
        return this.http.post<Detalle>(this.url, pa);
      }
}
