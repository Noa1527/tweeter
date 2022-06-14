function buildParams(params) {
    const output = new URLSearchParams();
    for (const [k, v] of Object.entries(params)) {
        if (Array.isArray(v)) {
            v.map((value) => output.append(k, value))
        } else {
            output.append(k, v)
        }
    }
    return output;
}

export async function apiFetch(endpoint, method, params = false) {
    const options = {
        mode: 'cors',
        header: {
            Accept: '*/*'
        }
    }
    let url = 'http://localhost/W-WEB-090-NCY-1-1-academie-mickael.raveneau/index.php'
    let response = null
    if (!method) {
        throw new Error('La requête doit contenir une méthode.')
    } else {
        if (method === 'GET' || method === "get") {
            if (params) {

                const finalParams = buildParams(params)
                url += endpoint + '?' + finalParams.toString()
                response = await fetch(url, options)

            } else {
                url += endpoint
                response = await fetch(endpoint, options)
            }
            
        } else if (method == "POST" || method == "post") {
            url += endpoint
            options["method"] = "POST";
            options["body"] = params
            response = await fetch(url, options)
        }
    }

    if (response.status === 204) {
        return null;
    }
    
    if (response.ok) {
        const responseData = await response.text()
        try {

            const data = JSON.parse(responseData)
            return data

        } catch (error) {

            return responseData
        }
    } else {
        if (responseData.errors) {
            throw new ApiErrors(responseData.errors)
        }
    }
}