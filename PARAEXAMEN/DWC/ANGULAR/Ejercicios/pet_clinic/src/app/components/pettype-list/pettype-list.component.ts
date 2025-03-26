import { Component, ElementRef } from '@angular/core';
import { Pettype } from '../../models/pettype';
import { PettypeService } from '../../services/pettype.service';
import { PettypeAddComponent } from '../pettype-add/pettype-add.component';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-pettype-list',
  imports: [PettypeAddComponent,FormsModule],
  templateUrl: './pettype-list.component.html',
  styleUrl: './pettype-list.component.css'
})
export class PettypeListComponent {
  pettypes:Pettype[];
  is_insert:boolean= false;
  current_edit:{
    pettype:Pettype,
    input:any
  };
  selId = -1;

  constructor(private servicioPetType:PettypeService,private elRef:ElementRef){
    this.pettypes = <Pettype[]>[];
    this.current_edit = { pettype: <Pettype>{}, input: null };
  }

  ngOnInit(){
    this.servicioPetType.getPetTypes().subscribe({
      next:pettypes => this.pettypes =pettypes,
      error:error => console.log(error)
    });
  }


  showAddPettypeComponent(){
    this.is_insert = !this.is_insert;
  }

  onNewPettype(new_pettype : Pettype){
    this.pettypes.push(new_pettype);
    this.showAddPettypeComponent();
  }

  editando(id:number){
    return (id ==this.selId)
  }

  editPettype(pettype:Pettype,name:HTMLInputElement,nameId:number){
    if(this.selId ==-1){
      this.selId = nameId

      this.current_edit.pettype = JSON.parse(JSON.stringify(pettype));
      this.current_edit.input = name;

      this.elRef.nativeElement = name;
      this.elRef.nativeElement.focus();

    }else{
      if(pettype.id == this.current_edit.pettype.id){
        this.selId =-1;

        pettype.name = this.current_edit.pettype.name;

      }else{
        this.elRef.nativeElement = this.current_edit.input;
        this.elRef.nativeElement.focus();
      }
    }
  }

  updatePettype(pettype:Pettype){
    this.servicioPetType.modPetTypes(pettype).subscribe(
      resp => {
        this.selId = -1;

      },
      error => console.log(error)
    );
  }

  deletePettype(pettype:Pettype){
    let msg ="Deseas ELIMINAR el tipo'" +pettype.name+"' ?";
    if(confirm(msg)){
      this.servicioPetType.delPettype(pettype.id).subscribe(
        resp =>{
            this.pettypes = this.pettypes.filter(tipo => tipo.id != pettype.id);

        },
        error => console.log(error)
      );
    }
  }
}
