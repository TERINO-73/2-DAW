import { Component } from '@angular/core';
import { Factura } from '../../model/factura';
import { PAJAXService } from '../../services/p-ajax.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Detalle } from '../../model/detalle';

@Component({
    selector: 'app-lista-detalle',
    standalone: false,
    templateUrl: './lista-detalle.component.html',
    styleUrl: './lista-detalle.component.css'
})
export class ListaDetalleComponent {
    public detalles: Detalle[] = [];
    public facturaId :number ; 
    public facturaNumero:number;
    public sumaIva: number = 0;
    public sumaTotal: number = 0;
    public detalleId: number = -1;
    public mostrarFormulario: boolean = false;

    public detalle: Detalle;

    constructor(private petition: PAJAXService, private ruta: Router, private route: ActivatedRoute) {
        this.facturaId = this.route.snapshot.params["numero"];
        this.facturaNumero = this.route.snapshot.params["id"];
        this.detalle = {
            id: -1,
            cantidad: 0,
            concepto: "",
            precio: 0,
            tipo_iva: 0,
            id_factura: this.facturaNumero
        }
        this.petition.detalle(this.facturaNumero).subscribe((daticos:any)=>{
    
            this.detalles = daticos;
        });


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
            this.petition.insertarDetalle(this.detalle).subscribe(datos => {
                
                this.detalles = datos;
                this.mostrarFormulario = false;
            })
        } else {
            console.log("Detalle obj:",this.detalle);

            this.detalle.id = this.detalleId;
            this.petition.editarDetalle(this.detalle).subscribe(datos => {
                console.log("datos:",datos);
                this.detalles = datos;
                this.mostrarFormulario = false;
            })
        }
    }

    borrar(detalleId: number,concepto :string) {
        if (confirm("¿Desea borrar el detalle con concepto " + concepto + "?")) {
            this.petition.borrarDetalle(detalleId, this.facturaNumero).subscribe(detalles => {
                this.detalles = detalles;
            });
        }
    }



}
