import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators, ReactiveFormsModule } from '@angular/forms';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { CommonModule } from '@angular/common';
import { PetService } from '../../services/pet.service';
import { OwnerService } from '../../services/owner.service';
import { Pet } from '../../models/pet';
import { Owner } from '../../models/owner';
import { Pettype } from '../../models/pettype';

@Component({
  selector: 'app-pet-add',
  standalone: true,
  imports: [ReactiveFormsModule, RouterLink, CommonModule],
  templateUrl: './pet-add.component.html',
  styleUrl: './pet-add.component.css'
})
export class PetAddComponent {
  public form: FormGroup;
  public addMode: boolean = true;
  public owner: Owner = <Owner>{};
  public pet: Pet = <Pet>{ type: <Pettype>{} };
  public petTypes: Pettype[] = [];

  constructor(
    private fb: FormBuilder,
    private servicePet: PetService,
    private serviceOwner: OwnerService,
    private ruta: Router,
    private rutaActiva: ActivatedRoute
  ) {
    this.form = this.fb.group({
      id: this.fb.control(-1),
      owner: this.fb.control('', [Validators.required]),
      name: this.fb.control('', [Validators.required, Validators.minLength(9)]),
      birthDate: this.fb.control('', [Validators.required]),
      type: this.fb.control('', [Validators.required]), // ✅ Asegurarse de que type está incluido
    });
    
  }

  ngOnInit() {
    const idOwner = this.rutaActiva.snapshot.params['idOwner'];
    const idPet = this.rutaActiva.snapshot.params['idPet'];

    this.serviceOwner.obtenerOwnerPorId(idOwner).subscribe({
      next: (owner) => {
        this.owner = owner;
        this.form.patchValue({ owner: owner.id }); 
      },
      error: (err) => console.log("Error al obtener Owner: ", err)
    });

    this.servicePet.obtenerTypes().subscribe({
      next: (types) => this.petTypes = types,
      error: (err) => console.log("Error al obtener Types: ", err)
    });

    if (idPet != -1) {
      this.addMode = false;
      this.servicePet.obtenerPetPorId(idPet).subscribe({
        next: (pet) => {
          this.pet = pet;
          this.form.patchValue({
            id: pet.id,
            owner: pet.owner.id,
            name: pet.name,
            birthDate: pet.birthDate,
            type: pet.type.id
          });
        },
        error: (err) => console.log("Error al obtener Pet: ", err)
      });
    }
  }

  onSubmit() {
    if (this.form.valid) {
      this.pet = { 
        ...this.pet, 
        ...this.form.value, 
        owner: this.owner, 
        type: { id: this.form.value.type }  // ✅ Asegura que type_id se envía correctamente
      };
  
      if (this.addMode) {
        this.insertarPet();
      } else {
        this.modificarPet();
      }
    }
  }
  

  insertarPet() {
    this.servicePet.insertarPet(this.pet).subscribe({
      next: () => this.ruta.navigate(["/detailOwner/", this.owner.id]),
      error: (err) => console.log("Error al insertar Pet: ", err)
    });
  }

  modificarPet() {
    this.servicePet.modificarPet(this.pet).subscribe({
      next: () => this.ruta.navigate(["/detailOwner/", this.owner.id]),
      error: (err) => console.log("Error al modificar Pet: ", err)
    });
  }
}
