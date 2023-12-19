import {http , httpFile} from "./http_service";

export function addNewNewsLetters(data){
    return httpFile().post('/storeNewsLetters' , data);
}