type: 'polarArea',
    data: {
        labels: ['Anger', 'Anticipation', 'Joy', 'Trust', 'Fear', 'Surprise','Sadness','Disgust'],
        datasets: [{
            label: '# of Votes',
            data: anger, 
            backgroundColor: [
                '#e3050590', 
                '#e3610590', 
                '#faf20590',
                '#46fa0590',
                '#00730890',
                '#00cad190',
                '#001cd190',
                '#6e00a190'
            ],
            borderColor: [
                'white'
            ],
            borderWidth: 1
        }]
    },




    datasets: [{
            label: 'anger',
            data: anger, 
            backgroundColor: '#e3050590', 
            borderColor: 'white',
            borderWidth: 1
        },

        {
            label: 'anticpation',
            data: anticipation, 
            backgroundColor: '#e3610590', 
            borderColor: 'white',
            borderWidth: 1
        },

        {
            label: 'joy',
            data: joy, 
            backgroundColor:'#faf20590',
            borderColor: 'white',
            borderWidth: 1
        },
        {
            label: 'trust',
            data: trust, 
            backgroundColor: '#46fa0590',
            borderColor: 'white',
            borderWidth: 1
        },
        {
            label: 'fear',
            data: fear, 
            backgroundColor: '#00730890',
            borderColor: 'white',
            borderWidth: 1
        },
        {
            label: 'surprise',
            data: surprise, 
            backgroundColor: '#00cad190',
            borderColor: 'white',
            borderWidth: 1
        },
        {
            label: 'sadness',
            data: sadness, 
            backgroundColor: '#001cd190',
            borderColor: 'white',
            borderWidth: 1
        },
        {
            label: 'disgust',
            data: disgust, 
            backgroundColor: '#6e00a190',
            borderColor: 'white',
            borderWidth: 1
        }]