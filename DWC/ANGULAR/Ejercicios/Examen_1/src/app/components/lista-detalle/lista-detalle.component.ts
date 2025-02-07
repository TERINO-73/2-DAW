import { Component } from '@angular/core';
import { Factura } from '../../model/factura';
import { PAJAXService } from '../../services/p-ajax.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Detalle } from '../../model/detalle';
import { FormsModule } from '@angular/forms';

@Component({
    selector: 'app-lista-detalle',
    standalone: true,
    imports: [
        FormsModule
    ],
    templateUrl: './lista-detalle.component.html',
    styleUrl: './lista-detalle.component.css'
})
export class ListaDetalleComponent {
    public detalles: Detalle[] = [];
    public facturaId :number;
    public facturaNumero :number;
    public sumaIva: number = 0;
    public sumaTotal: number = 0;
    public detalleId: number = -1;
    public mostrarFormulario: boolean = false;

    public detalle: Detalle;

    constructor(private pAJAX: PAJAXService, private ruta: Router, private aR: ActivatedRoute) {
        this.facturaId =parseInt(this.aR.snapshot.params["id"]);
        this.facturaNumero = this.aR.snapshot.params["numero"];
        this.detalle = {
            id: -1,
            cantidad: 0,
            concepto: "",
            precio: 0,
            tipo_iva: 0,
            id_factura: this.facturaId
        }

        this.pAJAX.detalle(this.facturaId).subscribe(detalles => {
            this.detalles = detalles;
        })
    }

    calcularSumaIva() {
        
        let sumaIva = 0;
        this.detalles.forEach(d => {
            sumaIva += (d.precio * d.cantidad) * (d.tipo_iva / 100);
        })

        return sumaIva;
    }

    calcularSumaTotal() {
        let sumaTotal = 0;

        this.detalles.forEach(d => {
            sumaTotal += (d.precio * d.cantidad) + ((d.precio * d.cantidad) * (d.tipo_iva / 100));
        })

        return sumaTotal;
    }

    volverAlInicio() {
        this.ruta.navigate(["/"]);
    }

    onSubmit() {
        if (this.detalleId == -1) {
            this.pAJAX.insertarDetalle(this.detalle, this.detalle.id_factura, this.detalle.cantidad, this.detalle.concepto, this.detalle.precio, this.detalle.tipo_iva).subscribe(datos => {
                this.detalles = datos;
                this.mostrarFormulario = false;
            })
        } else {
            this.detalle.id = this.detalleId;

            this.pAJAX.editarDetalle(this.detalle, this.detalle.id_factura, this.detalle.cantidad, this.detalle.concepto, this.detalle.precio, this.detalle.tipo_iva).subscribe(datos => {
                console.log(datos);
                this.detalles = datos;
                this.mostrarFormulario = false;
            })
        }
    }

    borrar(detalleId: number,concepto:string) {
        if (confirm("¿Desea borrar el detalle con concepto: " + concepto + "?")) {
            this.pAJAX.borrarDetalle(detalleId, this.facturaId).subscribe(detalles => {
                this.detalles = detalles;
            });
        }
    }
}
