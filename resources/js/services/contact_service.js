import {http , httpFile} from "./http_service";

export function addNewContact(data){
    return httpFile().post('/storeContactUs' , data);
}