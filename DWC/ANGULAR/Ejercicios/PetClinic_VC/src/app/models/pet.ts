import { Owner } from "./owner";
import { Pettype } from "./pettype";
import { Visit } from "./visit";

export interface Pet {
    id: number;
    name: string;
    birthDate: string;
    type: Pettype;
    typeName?: string;
    owner: Owner;
    visits: Visit[];
}
