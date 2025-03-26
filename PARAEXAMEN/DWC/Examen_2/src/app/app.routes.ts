import { Routes } from '@angular/router';
import { LocalesListComponent } from './components/locales/locales-list/locales-list.component';
import { LocalDetalleComponent } from './components/locales/local-detalle/local-detalle.component';
import { FormLocalComponent } from './components/locales/locales-form/locales-form.component';
import { CartasFormComponent } from './components/cartas/cartas-form/cartas-form.component';
import { ZonasFormComponent } from './components/zonas/zonas-form/zonas-form.component';
import { ZonasListComponent } from './components/zonas/zonas-list/zonas-list.component';
export const routes: Routes = [
    {path: '', component: LocalesListComponent},
    {path: 'detalle-local/:id',component:LocalDetalleComponent},
    {path:'formlocal/:id',component:FormLocalComponent},
    {path:'Carta-form/:id',component:CartasFormComponent},
    {path:'zonas-list/:id',component:ZonasListComponent}
];
