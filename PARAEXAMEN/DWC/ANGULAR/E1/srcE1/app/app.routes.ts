import { Routes } from '@angular/router';
import { ListaDetalleComponent } from './components/lista-detalle/lista-detalle.component';
import { PrincipalComponent } from './components/principal/principal.component';

export const routes: Routes = [
    {
        path: "",
        component: PrincipalComponent
    },
    {
        path: "detalle/:id/:numero",
        component: ListaDetalleComponent
    }
];
