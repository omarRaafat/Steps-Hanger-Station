import {http , httpFile} from "./http_service";

export function getSettings(){
    return http().get('/settings');
}

export function getBenifits(){
    return http().get('/benifits');
}

export function getWhySteps(){
    return http().get('/whySteps');
}

export function getSubServices(){
    return http().get('/sub_services');
}

export function getSections(){
    return http().get('/sections');
}

export function getTerms(){
    return http().get('/terms');
}

export function getPolicies(){
    return http().get('/policies');
}
// export function getPackageServices(){
//     return http().get('/getServices');
// }