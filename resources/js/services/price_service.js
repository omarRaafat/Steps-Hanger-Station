import {http , httpFile} from "./http_service";

export function getServicesFromPackage(){
    return http().get('/servicesWithPackages');
}

export function getExtraPackages(){
    return http().get('/extraPackages');
}

export function StoreSubscriptions(data){
    return httpFile().post('/storeSubscripes' , data);
}