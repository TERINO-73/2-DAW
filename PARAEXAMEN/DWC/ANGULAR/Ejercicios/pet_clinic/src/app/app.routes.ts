import { Routes } from '@angular/router';
import { OwnersComponent } from './components/owners/owners.component';
import { FormOwnerComponent } from './components/form-owner/form-owner.component';
import { DetailOwnerComponent } from './components/detail-owner/detail-owner.component';
import { PetAddComponent } from './components/pet-add/pet-add.component';
import { visitAddComponent } from './components/visit-add/visit-add.component';
export const routes: Routes = [

    {
        path:"",
        component:OwnersComponent
    },
    {
        path:"Owner-add/:id",
        component:FormOwnerComponent
    },
    {
        path:"Detail-owner/:id",
        component:DetailOwnerComponent
    },
    {
        path:"pet-add",
        component:PetAddComponent
    },
    {
        path:"visit-add",
        component:visitAddComponent
    },
    {
        path:"pet-add/:id",
        component:PetAddComponent
    },
    {
        path:"visit-add/:id",
        component:visitAddComponent
    },
];
