import { Routes } from '@angular/router';
import { OwnersComponent } from './components/owners/owners.component';
import { FormOwnerComponent } from './components/form-owner/form-owner.component';
import { DetailOwnerComponent } from './components/detail-owner/detail-owner.component';
import { PetAddComponent } from './components/pet-add/pet-add.component';
import { VisitAddComponent } from './components/visit-add/visit-add.component';
import { VetsComponent } from './components/vets/vets.component';
import { VetAddComponent } from './components/vet-add/vet-add.component';
import { PettypeListComponent } from './components/pettype-list/pettype-list.component';
import { PettypeAddComponent } from './components/pettype-add/pettype-add.component';
import { SpecialtyListComponent } from './components/specialty-list/specialty-list.component';

export const routes: Routes = [
    {path: '', component: OwnersComponent},
    {path: 'formOwner/:idOwner', component: FormOwnerComponent},
    {path: 'detailOwner/:idOwner', component: DetailOwnerComponent},
    {path: 'petAdd/:idOwner/:idPet', component: PetAddComponent},
    {path: 'visitAdd/:idPet/:idVisit', component: VisitAddComponent},
    {path: 'vetList', component: VetsComponent},
    {path: 'vetAdd/:idVet', component: VetAddComponent}, 
    {path: 'typeList', component: PettypeListComponent},
    {path: 'typeAdd/:idType', component: PettypeAddComponent},
    {path: 'specialties', component: SpecialtyListComponent},
    {path: 'specialties/:idSpecialty', component: SpecialtyListComponent},
];
