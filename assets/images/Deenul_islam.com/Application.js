const countrySelect = document.getElementById('country');
const stateSelect = document.getElementById('state');
const lgaSelect = document.getElementById('lga');

// Sample data (replace with your actual data)
const nigeriaStates = {
  "Nigeria": [
    "Abia", "Adamawa", "Akwa Ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Gombe", "Imo", "jigawa", "kaduna", "kano", "kastina", "kebbi", "kogi", "kwara", "Lagos", "nasarawa", "niger", 
    // ... other states
  ]
};

const lgaData = {
  "Abia": ["Aba North", "Aba South", "Arochukwu", "Bende", "Ikwuano", "Isiala Ngwa North", "Isiala Ngwa South", "Isuikwuato", "Obi Nwa", "Ohafia", "Ohaozara", "Ohuhu", "Ugwunagbo", "Umunneochi"],
  "Adamawa": ["Demsa", "Fulanin Gerei", "Ganye", "Gombi", "Guyuk", "Hong", "Jada", "Lamurde", "Madagali", "Maiha", "Michika", "Mubi North", "Mubi South", "Numan", "Shelleng", "Song", "Toungo", "Yola North", "Yola South"],
  "Akwa Ibom": ["Abak", "Eastern Obolo", "Eket", "Esit Eket", "Essien Udim", "Etim Ekpo", "Etinan", "Ibeno", "Ibesikpo Asutan", "Ibiono Ibom", "Ika", "Ikono", "Ikot Ekpene", "Ini", "Itu", "Mbo", "Mkpat Enin", "Nsit Atai", "Nsit Ibom", "Nsit Ubium", "Obot Akara", "Okobo", "Onna", "Oron", "Oruk Anam", "Udung Uko", "Ukanafun", "Uruan", "Urueffong Orouk Anam", "Uyo"],
  "Anambra": ["Aguata", "Anambra East", "Anambra West", "Anaocha", "Awka North", "Awka South", "Ayamelum", "Dunukofia", "Ekwusigo", "Idemili North", "Idemili South", "Ihiala", "Njikoka", "Nnewi North", "Nnewi South", "Ogbaru", "Onitsha North", "Onitsha South", "Orumba North", "Orumba South", "Oyi"],
  "Bauchi": ["Alkaleri", "Bauchi", "Bogoro", "Dass", "Darazo", "Damban", "Ganjuwa", "Giade", "Itas/Gadau", "Jama'are", "Kirfi", "Misau", "Ningi", "Shira", "Tafawa Balewa", "Toro", "Warji", "Zaki"],
  "Bayelsa": ["Brass", "Ekeremor", "Kolokuma/Opokuma", "Nembe", "Ogbia", "Sagbama", "Southern Ijaw", "Yenagoa"],
  "Benue": ["Agatu", "Apa", "Ado", "Buruku", "Gboko", "Guma", "Gwer East", "Gwer West", "Katsina-Ala", "Konshisha", "Kwande", "Logo", "Makurdi", "Obi", "Ogbadibo", "Ohimini", "Oju", "Okpokwu", "Otukpo", "Tarka", "Ukum", "Ushongo", "Vandeikya"],
  "Borno": ["Abadam", "Askira/Uba", "Bama", "Bayo", "Biu", "Chibok", "Damboa", "Dikwa", "Gubio", "Guzamala", "Gwoza", "Hawul", "Jere", "Kaga", "Kala/Balge", "Konduga", "Kukawa", "Kwaya Kusar", "Mafa", "Magumeri", "Maiduguri Metropolitan", "Marte", "Mobbar", "Monguno", "Ngala", "Nganzai", "Shari", "Shani"],
  "Cross River": ["Abi", "Akamkpa", "Akpabuyo", "Bakassi", "Bekwarra", "Biase", "Boki", "Calabar Municipal", "Calabar South", "Etung", "Ikom", "Obanliku", "Obubra", "Obudu", "Odukpani", "Ogoja", "Yakuur", "Yala"],
  "Delta": ["Aniocha North", "Aniocha South", "Bomadi", "Burutu", "Ethiope East", "Ethiope West", "Ika North East", "Ika South", "Isoko North", "Isoko South", "Ndokwa East", "Ndokwa West", "Okpe", "Oshimili North", "Oshimili South", "Sapele", "Udu", "Ughelli North", "Ughelli South", "Ukwuani", "Warri North", "Warri South", "Warri South West"],
  "Ebonyi": ["Abakaliki", "Afikpo North", "Afikpo South", "Ebonyi", "Ezza North", "Ezza South", "Ikwo", "Ishielu", "Ivo", "Ohaozara", "Ohaukwu", "Onicha"],
  "Edo": ["Akoko Edo", "Egor", "Esan Central", "Esan North-East", "Esan South-East", "Esan West", "Etsako Central", "Etsako East", "Etsako West", "Ikpoba Okha", "Orhionmwon", "Oredo", "Ovia North-East", "Ovia South-West", "Uhunmwonde"],
  "Ekiti": ["Ado Ekiti", "Ekiti East", "Ekiti North-East", "Ekiti South-West", "Ekiti West", "Ido Osi", "Ijero", "Ikere", "Irepodun/Ifelodun", "Ise/Orun", "Moba", "Oye"],
  "Enugu": ["Aninri", "Enugu East", "Enugu North", "Enugu South East", "Enugu West", "Ezeagu", "Igbo-Eze North", "Igbo-Eze South", "Isi-Uzo", "Nkanu East", "Nkanu West", "Nsukka", "Oji River", "Udenu", "Udi", "Uzo-Uwani"],
  "Gombe": ["Akko", "Balanga", "Billiri", "Dukku", "Funakaye", "Gombe", "Kaltungo", "Kwami", " Nafada/Bazza", "Shomgom", "Yamaltu/Deba"],
  "Imo": ["Aboh Mbaise", "Ahiazu Mbaise", "Ehime Mbano", "Ezinihitte Mbaise"], 
  "jigawa": [], 
  "kaduna": [], 
  "kano": []
};

countrySelect.addEventListener('change', () => {
  stateSelect.disabled = false;
  stateSelect.innerHTML = '<option value="">Select State</option>'; 

  const selectedCountry = countrySelect.value;
  if (selectedCountry in nigeriaStates) { 
    nigeriaStates[selectedCountry].forEach(state => {
      const option = document.createElement('option');
      option.value = state;
      option.text = state;
      stateSelect.appendChild(option);
    });
  }
});

stateSelect.addEventListener('change', () => {
  lgaSelect.disabled = false;
  lgaSelect.innerHTML = '<option value="">Select LGA</option>'; 

  const selectedState = stateSelect.value;
  if (selectedState in lgaData) { 
    lgaData[selectedState].forEach(lga => {
      const option = document.createElement('option');
      option.value = lga;
      option.text = lga;
      lgaSelect.appendChild(option);
    });
  }
});

