import { Routes } from '@angular/router';
import { InicioComponent } from './componentes/inicio/inicio.component';
import { AlumnosListadoComponent } from './componentes/alumnos-listado/alumnos-listado.component';
import { EstadoscivilesComponent } from './componentes/estadosciviles/estadosciviles.component';
import { SexosComponent } from './componentes/sexos/sexos.component';
import { AlumnoFormComponent } from './componentes/alumno-form/alumno-form.component';
import { SexosFormComponent } from './componentes/sexos-form/sexos-form.component';

export const routes: Routes = [
    {path:'',component:InicioComponent},
    {path:'alumnos-list',component:AlumnosListadoComponent},
    {path:'estadosciviles',component:EstadoscivilesComponent},
    {path:'sexo',component:SexosComponent},
    {path:'formAlum/:id',component:AlumnoFormComponent},
    {path:'formSexo/:codigo/:nombre',component:SexosFormComponent},
    {path:'formSexo/:codigo',component:SexosFormComponent},

    


];
