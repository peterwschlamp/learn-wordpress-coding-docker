Class Like {
	constructor() {
		alert('test'); 
	}

	events() {
 
	}

	//methods
}


export function testEndpoint() {
		$.ajax({
			beforeSend: (xhr) => {
				xhr.setRequestHeader('X-WP-Nonce', universityData.nonce);
			},
			url: universityData.root_url + '/wp-json/university/v1.like',
			type: 'POST',
			data: {'programId': 899},
			success: (response) => {
				console.log('success');
			},
			error: (response) => {
				console.log('error');
			}
		});    
}

export default Like;


