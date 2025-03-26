import { Owner } from "./owner";
// import { Pettype } from "./pettype";
// import { Visit } from "./visit";
export interface Pet {
    id: number;
    name:string;
    birthDate:Date;
    type:any;
    // type:Pettype;
    owner: Owner;
    visits:any[];
    // visits:Visit[]
}
