<template>
    <div class="import-cv-wrapper">

        <div class="title">
            <img src="/images/resume_builder/import/pic.png" alt="icon">
            Please upload <span> your cv in PDF or DOCX format</span>
        </div>

        <div class="import-action-btns">
            <div class="d-flex" v-if="extractedText.length < 1">
                <a class="btn btn-outline" href="javascript:void(0)" @click="openBrowse">
                    <img class="icon" src="/images/resume_builder/work-ex/add-box.png" alt="add">
                    Import  <span> PDF </span> file
                </a>
                <div class="auto-import-btn NoDecor">
                    <a v-show="file" href="javascript:void(0)" @click="uploadPDFFile">
                        Extract file
                        <img class="extract" src="/images/resume_builder/import/extract.png" alt="add">
                    </a>
                </div>
            </div>

            <div class="progress-bar-wrapper" v-show="progress > 0" v-if="extractedText.length < 1">
                <div class="upload-progress-bar" id="upload-progress-bar"></div>
                <div class="progress-bar-value">
                    {{progress}}%
                </div>
            </div>

            <div class="file-name"  v-show="file">
                <img src="/images/resume_builder/import/pic.png" alt="icon">
                {{file.name}}
                <img class="close" src="/images/resume_builder/my_account/close-modal.png" alt="icon" @click="clearFile">
            </div>

            <div class='w-100' v-if="extractedText.length < 1">
                <vue2Dropzone class="upload-image-box d-flex justify-content-center align-items-center"
                              id="cvDropZone"
                              :options="dropzoneOptions"
                              :useCustomSlot=true
                              v-on:vdropzone-file-added="handlingEvent"
                              v-on:vdropzone-thumbnail="thumbnail"
                              ref="newImport"
                >
                    <div class="d-flex align-items-center flex-column" style="opacity: 0.4;">
                        <div class="upload-text">
                            Or drag your file
                        </div>
                        <img src="/images/resume_builder/import/pic.png" alt="icon" class="mt-2" style="filter: grayscale(100%);">
                    </div>

                </vue2Dropzone>
            </div>
        </div>



        <input type="file" id="uploadFileButton" ref="file" @change="handleFileUpload"
               style="opacity:0; position: absolute; left:-500px;">


        <div class="import-results" v-show="extractedText.length > 0">

            <div class="title">
                Select <span>your information</span>
            </div>

            <div class="sections">
                <div class="section" v-for="section in sections" :key="section.title">
                    <div class="checkbox" @click="toggleSelectionOfSection(section)">
                        <img v-show="section.selected" src="/images/resume_builder/import/checkedBox.svg" alt="checkbox">
                        <img v-show="!section.selected" src="/images/resume_builder/import/uncheckedBox.svg" alt="checkbox">
                    </div>
                    <div class="section-content" :class="{active : section.selected}">
                        <div class="import-section-title">
                            <span  @click="toggleSelectionOfSection(section)">{{section.title}}</span>
                            <img src="/images/resume_builder/import/edit-icon.svg" alt="edit icon" @click="editSection(section.title)">
                        </div>
                        <div class="section-content-items" v-show="section.title === 'profile'">
                            <div class="content-item">
                                <div class="bold">Email:</div>
                                <div> {{freelancerData.email ? freelancerData.email : 'Couldn\'t find email' }}</div>
                            </div>
                            <div class="content-item">
                                <div class="bold">Phone:</div>
                                <div> {{freelancerData.phone ? freelancerData.phone : 'Couldn\'t find phone' }}</div>
                            </div>
                            <div class="content-item">
                                <div class="bold">Location:</div>
                                <div> {{freelancerData.location ? freelancerData.location : 'Couldn\'t find location' }}</div>
                            </div>
                            <div class="content-item">
                                <div class="bold">Designation:</div>
                                <div> {{freelancerData.designation ? freelancerData.designation : 'Couldn\'t find designation' }}</div>
                            </div>
                        </div>

                        <div class="section-content-items" v-show="section.title === 'summary'">
                            <div class="content-item">
                                <div class="bold"> About: </div>
                                <div>  {{freelancerData.about ? freelancerData.about : 'Couldn\'t find about information' }} </div>
                            </div>
                        </div>

                        <div class="section-content-items" v-show="section.title === 'languages'">
                            <div class="content-item">
                                <div class="bold"> Languages: </div>
                                <div>
                                    <div  v-if="freelancerData.languages.length > 0" class="d-flex flex-wrap">
                                        <div v-for="(language,index) in freelancerData.languages" :key="index" v-if="language.length > 0">
                                            {{language}} <span v-if="index+1 < freelancerData.languages.length"> |</span>
                                        </div>
                                    </div>

                                    <div v-else>
                                        Couldn't find skills
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section-content-items" v-show="section.title === 'work'">
                            <div class="content-item">
                                <div class="bold">  </div>
                                <div> {{freelancerData.work_experience.length > 0 ? freelancerData.work_experience : 'Couldn\'t find work experience' }} </div>
                            </div>
                        </div>

                        <div class="section-content-items" v-show="section.title === 'education'">
                            <div class="content-item">
                                <div class="bold"> </div>
                                <div> {{freelancerData.education.length > 0 ? freelancerData.education : 'Couldn\'t find education' }} </div>
                            </div>
                        </div>

                        <div class="section-content-items" v-show="section.title === 'skills'">
                            <div class="content-item">
                                <div class="bold"> Skills: </div>
                                <div>
                                    <div  v-if="freelancerData.skills.length > 0" class="d-flex flex-wrap">
                                        <div v-for="(skill,index) in freelancerData.skills" :key="index" v-if="skill.length > 0">
                                            {{skill}} <span v-if="index+1 < freelancerData.skills.length"> |</span>
                                        </div>
                                    </div>

                                    <div v-else>
                                        Couldn't find skills
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section-content-items" v-show="section.title === 'achievements'">
                            <div class="content-item">
                                <div class="bold"> </div>
                                <div> {{freelancerData.achievements.length > 0 ? freelancerData.achievements : 'Couldn\'t find achievements' }} </div>
                            </div>
                        </div>


                        <div class="section-content-items" v-show="section.title === 'hobbies'">
                            <div class="content-item">
                                <div class="bold"> </div>
                                <div> {{freelancerData.hobbies.length > 0 ? freelancerData.hobbies : 'Couldn\'t find hobbies' }} </div>
                            </div>
                        </div>

                        <div class="section-content-items" v-show="section.title === 'references'">
                            <div class="content-item">
                                <div class="bold"></div>
                                <div> {{freelancerData.references.length > 0 ? freelancerData.references : 'Couldn\'t find references' }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="eye-icon" v-show="extractedText.length > 0" @click="showFullText = !showFullText" @mouseenter="showToolTip = true" @mouseleave="showToolTip = false">
            <img src="/images/resume_builder/imports/eye.png" alt="eye icon">
            <div class="custom-tooltip" v-show="showToolTip">
                {{ showFullText ? 'Hide' : 'Show'}} full CV text
            </div>
        </div>


        <div class="pl-5 pr-5" v-show="showFullText">
            <div class="row w-100">
                <div class="col-12 border-dark m-3 p-2" style="white-space: pre-line; border: 1px dotted;"
                     v-show="extractedText.length > 0">
                    {{extractedText}}
                </div>
            </div>

            <div v-show="errors.cv" style="color: red;" class="mt-3">
                {{errors.cv}}
            </div>
        </div>
    </div>
</template>

<script>


    export default {
        name: "ImportPDF",
        data() {
            return {
                translationLanguage: 'select',
                file: '',
                extractedText: '',
                originalText: '',
                arrayOfExtractedText:[],
                errors: [],
                freelancerData: {
                    'phone': '',
                    'email': '',
                    'designation': '',
                    'about': '',
                    'location': '',
                    'work_experience': '',
                    'education': '',
                    'skills': [],
                    'languages': [],
                    'links': [],
                    'achievements': [],
                    'hobbies': [],
                    'references': [],
                },
                countryList: [
                    "Afghanistan",
                    "Albania",
                    "Algeria",
                    "American Samoa",
                    "Andorra",
                    "Angola",
                    "Anguilla",
                    "Antarctica",
                    "Antigua and Barbuda",
                    "Argentina",
                    "Armenia",
                    "Aruba",
                    "Australia",
                    "Austria",
                    "Azerbaijan",
                    "Bahamas (the)",
                    "Bahrain",
                    "Bangladesh",
                    "Barbados",
                    "Belarus",
                    "Belgium",
                    "Belize",
                    "Benin",
                    "Bermuda",
                    "Bhutan",
                    "Bolivia (Plurinational State of)",
                    "Bonaire, Sint Eustatius and Saba",
                    "Bosnia and Herzegovina",
                    "Botswana",
                    "Bouvet Island",
                    "Brazil",
                    "British Indian Ocean Territory (the)",
                    "Brunei Darussalam",
                    "Bulgaria",
                    "Burkina Faso",
                    "Burundi",
                    "Cabo Verde",
                    "Cambodia",
                    "Cameroon",
                    "Canada",
                    "Cayman Islands (the)",
                    "Central African Republic (the)",
                    "Chad",
                    "Chile",
                    "China",
                    "Christmas Island",
                    "Cocos (Keeling) Islands (the)",
                    "Colombia",
                    "Comoros (the)",
                    "Congo (the Democratic Republic of the)",
                    "Congo (the)",
                    "Cook Islands (the)",
                    "Costa Rica",
                    "Croatia",
                    "Cuba",
                    "Curaçao",
                    "Cyprus",
                    "Czechia",
                    "Côte d'Ivoire",
                    "Denmark",
                    "Djibouti",
                    "Dominica",
                    "Dominican Republic (the)",
                    "Ecuador",
                    "Egypt",
                    "El Salvador",
                    "Equatorial Guinea",
                    "Eritrea",
                    "Estonia",
                    "Eswatini",
                    "Ethiopia",
                    "Falkland Islands (the) [Malvinas]",
                    "Faroe Islands (the)",
                    "Fiji",
                    "Finland",
                    "France",
                    "French Guiana",
                    "French Polynesia",
                    "French Southern Territories (the)",
                    "Gabon",
                    "Gambia (the)",
                    "Georgia",
                    "Germany",
                    "Ghana",
                    "Gibraltar",
                    "Greece",
                    "Greenland",
                    "Grenada",
                    "Guadeloupe",
                    "Guam",
                    "Guatemala",
                    "Guernsey",
                    "Guinea",
                    "Guinea-Bissau",
                    "Guyana",
                    "Haiti",
                    "Heard Island and McDonald Islands",
                    "Holy See (the)",
                    "Honduras",
                    "Hong Kong",
                    "Hungary",
                    "Iceland",
                    "India",
                    "Indonesia",
                    "Iran (Islamic Republic of)",
                    "Iraq",
                    "Ireland",
                    "Isle of Man",
                    "Israel",
                    "Italy",
                    "Jamaica",
                    "Japan",
                    "Jersey",
                    "Jordan",
                    "Kazakhstan",
                    "Kenya",
                    "Kiribati",
                    "Korea (the Democratic People's Republic of)",
                    "Korea (the Republic of)",
                    "Kuwait",
                    "Kyrgyzstan",
                    "Lao People's Democratic Republic (the)",
                    "Latvia",
                    "Lebanon",
                    "Lesotho",
                    "Liberia",
                    "Libya",
                    "Liechtenstein",
                    "Lithuania",
                    "Luxembourg",
                    "Macao",
                    "Madagascar",
                    "Malawi",
                    "Malaysia",
                    "Maldives",
                    "Mali",
                    "Malta",
                    "Marshall Islands (the)",
                    "Martinique",
                    "Mauritania",
                    "Mauritius",
                    "Mayotte",
                    "Mexico",
                    "Micronesia (Federated States of)",
                    "Moldova (the Republic of)",
                    "Monaco",
                    "Mongolia",
                    "Montenegro",
                    "Montserrat",
                    "Morocco",
                    "Mozambique",
                    "Myanmar",
                    "Namibia",
                    "Nauru",
                    "Nepal",
                    "Netherlands (the)",
                    "New Caledonia",
                    "New Zealand",
                    "Nicaragua",
                    "Niger (the)",
                    "Nigeria",
                    "Niue",
                    "Norfolk Island",
                    "Northern Mariana Islands (the)",
                    "Norway",
                    "Oman",
                    "Pakistan",
                    "Palau",
                    "Palestine, State of",
                    "Panama",
                    "Papua New Guinea",
                    "Paraguay",
                    "Peru",
                    "Philippines (the)",
                    "Pitcairn",
                    "Poland",
                    "Portugal",
                    "Puerto Rico",
                    "Qatar",
                    "Republic of North Macedonia",
                    "Romania",
                    "Russian Federation (the)",
                    "Rwanda",
                    "Réunion",
                    "Saint Barthélemy",
                    "Saint Helena, Ascension and Tristan da Cunha",
                    "Saint Kitts and Nevis",
                    "Saint Lucia",
                    "Saint Martin (French part)",
                    "Saint Pierre and Miquelon",
                    "Saint Vincent and the Grenadines",
                    "Samoa",
                    "San Marino",
                    "Sao Tome and Principe",
                    "Saudi Arabia",
                    "Senegal",
                    "Serbia",
                    "Seychelles",
                    "Sierra Leone",
                    "Singapore",
                    "Sint Maarten (Dutch part)",
                    "Slovakia",
                    "Slovenia",
                    "Solomon Islands",
                    "Somalia",
                    "South Africa",
                    "South Georgia and the South Sandwich Islands",
                    "South Sudan",
                    "Spain",
                    "Sri Lanka",
                    "Sudan (the)",
                    "Suriname",
                    "Svalbard and Jan Mayen",
                    "Sweden",
                    "Switzerland",
                    "Syrian Arab Republic",
                    "Taiwan (Province of China)",
                    "Tajikistan",
                    "Tanzania, United Republic of",
                    "Thailand",
                    "Timor-Leste",
                    "Togo",
                    "Tokelau",
                    "Tonga",
                    "Trinidad and Tobago",
                    "Tunisia",
                    "Turkey",
                    "Turkmenistan",
                    "Turks and Caicos Islands (the)",
                    "Tuvalu",
                    "Uganda",
                    "Ukraine",
                    "United Arab Emirates (the)",
                    "United Kingdom of Great Britain and Northern Ireland (the)",
                    "United States Minor Outlying Islands (the)",
                    "United States of America (the)",
                    "Uruguay",
                    "Uzbekistan",
                    "Vanuatu",
                    "Venezuela (Bolivarian Republic of)",
                    "Viet Nam",
                    "Virgin Islands (British)",
                    "Virgin Islands (U.S.)",
                    "Wallis and Futuna",
                    "Western Sahara",
                    "Yemen",
                    "Zambia",
                    "Zimbabwe",
                    "Åland Islands"
                ],
                skillsList: [
                    'JavaScript',
                    'HTML',
                    'CSS.',
                    'SASS',
                    'SQL',
                    'Python',
                    'Java',
                    'Bash/Shell/PowerShell',
                    'C#',
                    'PHP',
                    'TypeScript',
                    // 'C++',
                    'C Language',
                    'Ruby',
                    'Go',
                    'Swift',
                    'Kotlin',
                    'R Language',
                    'VBA',
                    'Objective-C',
                    'Assembly',
                    'Scala',
                    'Rust',

                    'jQuery',
                    'Angular/Angular.js',
                    'React.js',
                    'Meteor.js',
                    'Socket.io',
                    'Cordova',
                    'Android',
                    'Bootstrap',
                    'Keystone.js',
                    'Vue.js',
                    'AWS',
                    'Redux',
                    'Hapi.js',
                    'React Native',
                    'Microservices',
                    'ASP.NET',
                    'Express',
                    'Spring',
                    'Vue.js',
                    'Django',
                    'Flask',
                    'Laravel',
                    'Ruby,on,Rails',
                    'Drupal',
                    'Node.js',
                    '.NET',
                    '.NET,Core',
                    'Pandas',
                    'React,Native',
                    'Ansible',
                    'TensorFlow',
                    'Unity,3D',
                    'Cordova',
                    'Xamarin',
                    'Apache,Spark',
                    'Hadoop',
                    'Flutter',
                    'Wordpress',

                    'MySQL',
                    'PostgreSQL',
                    'Microsoft,SQL,Server',
                    'SQLite',
                    'MongoDB',
                    'Redis',
                    'MariaDB',
                    'Oracle',
                    'Elasticsearch',
                    'Firebase',
                    'DynamoDB',
                    'Cassandra',
                    'Couchbase',

                    'Adobe After Effects',
                    'Sketch',
                    'Adobe Illustrator',
                    'Adobe XD',
                    'Photoshop',
                    'Autocad',
                    'Solidworks',
                    'Adobe Flash',
                    'Digital Drawing Tablet',
                    'Adobe Indesign',
                    'CorelDraw',
                    '3d Max'
                ],
                languages: [
                    "Abkhaz",
                    "Afar",
                    "Afrikaans",
                    "Akan",
                    "Albanian",
                    "Amharic",
                    "Arabic",
                    "Aragonese",
                    "Armenian",
                    "Assamese",
                    "Avaric",
                    "Avestan",
                    "Aymara",
                    "Azerbaijani",
                    "Bambara",
                    "Bashkir",
                    "Basque",
                    "Belarusian",
                    "Bengali",
                    "Bihari",
                    "Bislama",
                    "Bosnian",
                    "Breton",
                    "Bulgarian",
                    "Burmese",
                    "Catalan; Valencian",
                    "Chamorro",
                    "Chechen",
                    "Chichewa; Chewa; Nyanja",
                    "Chinese",
                    "Chuvash",
                    "Cornish",
                    "Corsican",
                    "Croatian",
                    "Czech",
                    "Danish",
                    "Divehi; Dhivehi; Maldivian;",
                    "Dutch",
                    "English",
                    "Esperanto",
                    "Estonian",
                    "Faroese",
                    "Fijian",
                    "Finnish",
                    "French",
                    "Fula; Fulah; Pulaar; Pular",
                    "Galician",
                    "Georgian",
                    "German",
                    "Greek, Modern",
                    "Guaraní",
                    "Gujarati",
                    "Haitian; Haitian Creole",
                    "Hausa",
                    "Hebrew (modern)",
                    "Herero",
                    "Hindi",
                    "Hiri Motu",
                    "Hungarian",
                    "Interlingua",
                    "Indonesian",
                    "Interlingue",
                    "Irish",
                    "Igbo",
                    "Inupiaq",
                    "Ido",
                    "Icelandic",
                    "Italian",
                    "Inuktitut",
                    "Japanese",
                    "Javanese",
                    "Kalaallisut, Greenlandic",
                    "Kannada",
                    "Kanuri",
                    "Kashmiri",
                    "Kazakh",
                    "Khmer",
                    "Kikuyu, Gikuyu",
                    "Kinyarwanda",
                    "Kirghiz, Kyrgyz",
                    "Komi",
                    "Kongo",
                    "Korean",
                    "Kurdish",
                    "Kwanyama, Kuanyama",
                    "Latin",
                    "Luxembourgish, Letzeburgesch",
                    "Luganda",
                    "Limburgish, Limburgan, Limburger",
                    "Lingala",
                    "Lao",
                    "Lithuanian",
                    "Luba-Katanga",
                    "Latvian",
                    "Manx",
                    "Macedonian",
                    "Malagasy",
                    "Malay",
                    "Malayalam",
                    "Maltese",
                    "Māori",
                    "Marathi (Marāṭhī)",
                    "Marshallese",
                    "Mongolian",
                    "Nauru",
                    "Navajo, Navaho",
                    "Norwegian Bokmål",
                    "North Ndebele",
                    "Nepali",
                    "Ndonga",
                    "Norwegian Nynorsk",
                    "Norwegian",
                    "Nuosu",
                    "South Ndebele",
                    "Occitan",
                    "Ojibwe, Ojibwa",
                    "Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic",
                    "Oromo",
                    "Oriya",
                    "Ossetian, Ossetic",
                    "Panjabi, Punjabi",
                    "Pāli",
                    "Persian",
                    "Polish",
                    "Pashto, Pushto",
                    "Portuguese",
                    "Quechua",
                    "Romansh",
                    "Kirundi",
                    "Romanian, Moldavian, Moldovan",
                    "Russian",
                    "Sanskrit (Saṁskṛta)",
                    "Sardinian",
                    "Sindhi",
                    "Northern Sami",
                    "Samoan",
                    "Sango",
                    "Serbian",
                    "Scottish Gaelic; Gaelic",
                    "Shona",
                    "Sinhala, Sinhalese",
                    "Slovak",
                    "Slovene",
                    "Somali",
                    "Southern Sotho",
                    "Spanish; Castilian",
                    "Sundanese",
                    "Swahili",
                    "Swati",
                    "Swedish",
                    "Tamil",
                    "Telugu",
                    "Tajik",
                    "Thai",
                    "Tigrinya",
                    "Tibetan Standard, Tibetan, Central",
                    "Turkmen",
                    "Tagalog",
                    "Tswana",
                    "Tonga (Tonga Islands)",
                    "Turkish",
                    "Tsonga",
                    "Tatar",
                    "Tahitian",
                    "Uighur, Uyghur",
                    "Ukrainian",
                    "Urdu",
                    "Uzbek",
                    "Venda",
                    "Vietnamese",
                    "Volapük",
                    "Walloon",
                    "Welsh",
                    "Wolof",
                    "Western Frisian",
                    "Xhosa",
                    "Yiddish",
                    "Yoruba",
                    "Zhuang, Chuang"
                ],
                progress:0,
                dropzoneOptions: {
                    url: 'https://httpbin.org/post',
                    thumbnailWidth: 150,
                    uploadMultiple: false,
                    maxFilesize: 25,
                    addRemoveLinks: true,
                    maxFiles: 1,
                    autoProcessQueue: false,
                    acceptedFiles: '*',
                    previewTemplate: `
            <div class="dz-preview dz-file-preview">
                <div class="dz-image">
                    <div class="thumbnail" data-dz-thumbnail-bg></div>
                </div>
                <div class="dz-details">
                    <div class="dz-size"><span data-dz-size></span></div>
                    <div class="dz-filename"><span data-dz-name></span></div>
                </div>
            </div>
        `
                },
                sections:[
                    {
                        title:'profile',
                        selected: 1,

                    },
                    {
                        title:'summary',
                        selected: 1,

                    },
                    {
                        title:'languages',
                        selected: 1,

                    },
                    {
                        title:'work',
                        selected: 1,

                    },
                    {
                        title:'education',
                        selected: 1,

                    },
                    {
                        title:'skills',
                        selected: 1,

                    },
                    {
                        title:'achievements',
                        selected: 1,

                    },
                    {
                        title:'hobbies',
                        selected: 1,

                    },
                    {
                        title:'references',
                        selected: 1,

                    }
                ],
                showFullText: false,
                showToolTip: false
            }
        },
        methods: {

            // handle file upload
            openBrowse() {
                $('#uploadFileButton').click();
            },
            goToExternalURL(link) {
                if (link.includes('http')) {
                    window.open(link, '_blank');

                } else {
                    window.open('http://' + link, '_blank');
                }

            },
            uploadPDFFile() {
                this.errors = [];
                let formData = new FormData();
                formData.append('cv', this.file);
                const config = {
                    onUploadProgress: progressEvent => {
                         this.progress = (progressEvent.loaded/progressEvent.total) * 100 ;
                        $('#upload-progress-bar').css('width',this.progress + '%');
                    } ,
                    headers:{'Content-Type': 'multipart/form-data'}
                };

                if(this.file.type === 'application/pdf'){
                    axios.post('/resume-builder/import/pdf', formData, config)
                        .then((response) => {
                            if (response.data.length > 0) {
                                this.extractedText = response.data;
                                this.originalText = response.data;
                                this.clearFreelancerData();
                            } else {
                                this.extractedText = 'This file does not contain any text to be extracted!';
                            }
                            this.arrayOfExtractedText = this.extractedText.split("\n");
                            this.searchForData();
                        })
                        .catch((error) => {
                            if (typeof error.response.data === 'object') {
                                this.errors = error.response.data.errors;
                            } else {
                                this.errors = ['Something went wrong. Please try again.'];
                            }
                        });
                }else{
                    axios.post('/resume-builder/import/docx', formData, config)
                        .then((response) => {
                           this.extractDocText(response.data) ;
                        })
                        .catch((error) => {
                            if (typeof error.response.data === 'object') {
                                this.errors = error.response.data.errors;
                            } else {
                                this.errors = ['Something went wrong. Please try again.'];
                            }
                        });
                }

            },
            clearFreelancerData() {
                this.freelancerData = {
                    'phone': '', // done
                    'email': '', // done
                    'designation': '', // done
                    'location': '', // done
                    'about': '',
                    'work_experience': [],
                    'education': [],
                    'achievements': [],
                    'hobbies': [],
                    'references': [],
                    'skills': [], //done
                    'languages': [], // done
                    'links': [], // done (might need more work for special social links)
                };
            },
            clearFile(){
              this.clearFreelancerData();
              this.file = '';
              this.extractedText = '';
              this.progress = 0;
            },
            handleFileUpload() {
                this.file = this.$refs.file.files[0];
            },


            // dropzone funcions
            handlingEvent: function (file) {
                if (file.type === 'application/pdf' ) {

                    // Set default bg for pdf files
                    let thumbnail = document.querySelector('.thumbnail');

                    // create the file URL to embembed
                    let fileURL = URL.createObjectURL(file);
                    let embedElement = document.createElement('embed');

                    embedElement.type = file.type;
                    embedElement.src = fileURL;


                    thumbnail.style.background = `url(${fileURL})`;
                    thumbnail.appendChild(embedElement);
                }

                this.file = file
            },
            thumbnail: function(file, dataUrl) {
                var j, len, ref, thumbnailElement;

                if (file.previewElement) {
                    file.previewElement.classList.remove("dz-file-preview");
                    ref = file.previewElement.querySelectorAll("[data-dz-thumbnail-bg]");

                    for (j = 0, len = ref.length; j < len; j++) {
                        thumbnailElement = ref[j];
                        thumbnailElement.alt = file.name;
                        thumbnailElement.style.backgroundImage = 'url("' + dataUrl + '")';
                    }

                    return setTimeout(((function(_this) {
                        return function() {
                            return file.previewElement.classList.add("dz-image-preview");
                        };
                    })(this)), 1);
                }
            },


            // document extracting text funtions:
            extractDocText(sections){
                sections.forEach( section => {
                    section.elements.forEach( element => {
                        if(element.elements.length > 0){
                            if(element.elements[0].text){
                                console.log(element.elements[0].text);
                                this.extractedText += element.elements[0].text;
                                this.arrayOfExtractedText.push(element.elements[0].text);
                            }
                        }
                    });
                });

                this.searchForData();
            },


            // selection:
            toggleSelectionOfSection(section){
                section.selected = !section.selected;
            },


            // search functions
            searchForData() {
                let arrayOfData = this.arrayOfExtractedText;

                arrayOfData.forEach((textLine) => {
                    // check for single fields:

                    if (!this.freelancerData.email) {
                        this.searchForEmail(textLine);
                    }
                    if (!this.freelancerData.phone) {
                        this.searchForPhone(textLine);
                    }
                    if (!this.freelancerData.designation) {
                        this.searchForJobTitle(textLine);
                    }
                    if (!this.freelancerData.location) {
                        this.searchForCountry(textLine);
                    }

                    // check for array fields :
                    this.searchForSkills(textLine);
                    this.searchForLanguages(textLine);
                    this.searchForLinks(textLine);

                });

                // check for long text fields like education, work experience and references :

                this.searchForEducationText();
                this.searchForExperienceText();
                this.searchForReferencesText();

            },
            searchForEducationText() {
                // this.freelancerData.education = this.extractedText.match(/((?<=Education)|(?<=EDUCATION))[\S\s]*?((?=Languages)|(?=LANGUAGES)|(?<=Experience)|(?<=EXPERIENCE)|(?=Skills)|(?=SKILLS)|(?=CAREER OBJECTIVE)|(?=Carrer Objective)|(?=REFEREES)|(?=References)|(?=Technologies)|(?=TECHNOLOGIES)|(?=Summary)|(?=SUMMURY)|(?=Projects)|(?=PROJECTS))/);
            },
            searchForExperienceText() {
                // this.freelancerData.work_experience = this.extractedText.match(/((?<=Experience)|(?<=EXPERIENCE)|(?<=Work)|(?<=WORK))[\S\s]*?((?=Education)|(?=Skills)|(?=SKILLS)|(?=CAREER OBJECTIVE)|(?=Carrer Objective)|(?=REFEREES)|(?=References)|(?=Languages)|(?=LANGUAGES)|(?=Technologies)|(?=TECHNOLOGIES)|(?=Summary)|(?=SUMMURY)|(?=Projects)|(?=PROJECTS))/);
            },
            searchForReferencesText() {
                // this.freelancerData.references = this.extractedText.match(/((?<=References)|(?<=REFEREES)|(?<=REFERENCES)|(?<=Referees))[\S\s]*?((?=Education)|(?=Skills)|(?=SKILLS)|(?=CAREER OBJECTIVE)|(?=Carrer Objective)|(?=Experience)|(?=EXPERIENCE)|(?=Languages)|(?=LANGUAGES)|(?=Technologies)|(?=TECHNOLOGIES)|(?=Summary)|(?=SUMMURY)|(?=Projects)|(?=PROJECTS))/);
            },
            nl2br(str) {
                let breakTag = ' ';
                return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
            },
            searchForEmail(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let emailRegex = /([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/gi;
                if (cleanTextLine.match(emailRegex)) {
                    cleanTextLine = cleanTextLine.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, '');
                    cleanTextLine = cleanTextLine.replace('Email', '');
                    this.freelancerData.email = cleanTextLine;
                }
            },
            searchForPhone(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                cleanTextLine = cleanTextLine.replace(/-/g, "");
                let phoneRegex = /(?:(?:\+?([1-9]|[0-9][0-9]|[0-9][0-9][0-9])\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([0-9][1-9]|[0-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?/;
                let arrayOfNumbers = cleanTextLine.match(phoneRegex);
                if (arrayOfNumbers) {
                    cleanTextLine = cleanTextLine.replace(/\D/g,'');
                    this.freelancerData.phone = cleanTextLine;
                }
            },
            searchForLinks(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let linkRegex = /(https?:\/\/(?:www\.|(?!www))[^\s]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,}|[^\s]+\.com|[^\s]+\.net|[^\s]+\.org|[^\s]+\.gov)/gi;
                let link = cleanTextLine.match(linkRegex);
                if (link !== null) {
                    // check and remove if email  :
                    let emailRegex = /([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/gi;
                    if (!emailRegex.test(cleanTextLine)) {
                        this.freelancerData.links.push(cleanTextLine);
                    }
                }

                this.freelancerData.links = Array.from(new Set(this.freelancerData.links))
            },
            searchForCountry(textLine) {
                // check if any word of the text line is a country name
                let cleanTextLine = textLine.replace(/\s/g, "");
                cleanTextLine = cleanTextLine.replace(/-/g, "");
                for (let i = 0; i < this.countryList.length; i++) {
                    let countryRegex = new RegExp(this.countryList[i], 'ig');
                    if (countryRegex.test(cleanTextLine)) {
                        this.freelancerData.location = this.countryList[i];
                        break;
                    }
                }

            },
            searchForJobTitle(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let jobTitleRegex = /developer|designer|programmer|senior|junior|middle|full-stack/ig;
                if (jobTitleRegex.test(cleanTextLine)) {
                    this.freelancerData.designation = textLine
                }
            },
            searchForSkills(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let skillRegex = new RegExp(this.skillsList.join('|'), 'ig');
                let skills = cleanTextLine.match(skillRegex);
                if (skills !== null) {
                    this.freelancerData.skills.push(...skills);
                }
                // filter repeated elements in skills :
                this.freelancerData.skills = Array.from(new Set(this.freelancerData.skills))
            },
            searchForLanguages(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let languageRegex = new RegExp(this.languages.join('|'), 'ig');
                let languages = cleanTextLine.match(languageRegex);
                if (languages !== null) {
                    this.freelancerData.languages.push(...languages);
                }
                // filter repeated elements in languages :
                this.freelancerData.languages = Array.from(new Set(this.freelancerData.languages))
            },


            // edit function
            editSection(section_title){
                console.log(section_title);
            },


            // saving data:
            savePersonalData(){
                //    ( personal ) [email,phone,location,designation]
            },
            saveSkills(){
                // we have only the title.
            },
            saveLanguages(){
                // we have only the language title

            }
        },
        mounted() {

        }
    }
</script>

<style scoped lang="scss">
    @import '../../../../sass/media-queries';

    $activeColor : #001CE2;

    .pre-formatted {
        white-space: pre-line;
    }

    .import-cv-wrapper {
        margin-top: 100px;
        width: 100%;

        .title {
             display: flex;
            align-content: center;
            font-weight: 600;
            font-size: 40px;
            text-align: left;
            color: #081fe2;

            @include lt-md {
                font-size: 30px;
            }

            span {
                font-weight: 500;
                margin-left: 10px;
            }

            img {
                width: 49.79px;
                height: 49.79px;
                margin-right: 28px;
            }
        }

        .eye-icon{
            width: fit-content;
            margin-bottom: 40px;
            max-height: 50px;
            img{
                margin-top: 25px;
                border-radius: 5px;
                width: fit-content;
                padding: 10px;
                border: whitesmoke solid 2px;
                &:hover{
                    cursor: pointer;
                }
            }

           .custom-tooltip{
               position: relative;
               bottom: 42px;
               left: 80px;
               border-radius: 5px;
               padding: 5px;
               width: 140px;
               background-color: black;
               color: #fff;
               text-align: center;
               &::after {
                   content: "";
                   position: absolute;
                   top: 50%;
                   right: 100%;
                   margin-top: -5px;
                   border-width: 5px;
                   border-style: solid;
                   border-color: transparent black transparent transparent;
               }
           }
        }



        .import-action-btns {
            margin-top: 70px;
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            width: 100%;
            height: auto;
            background: whitesmoke;
            padding: 60px 70px;

            .d-flex {
                justify-content: flex-start;
                width: 100%;

                @include lt-sm {
                    flex-wrap: wrap;
                }
            }


            @include lt-sm {
                padding: 40px;

                .btn {
                    width: 100%;
                    min-width: 90px !important;
                }
            }

            .auto-import-btn {
                margin-left: 15px;
                width: 40%;

                @include lt-sm {
                    height: 56px;
                    margin-top: 1rem;
                    width: 100%;
                }

                a {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    max-width: 260px;
                    height: 72px;

                    border: 1.5px solid #001CE2;
                    border-radius: 8px;
                    opacity: 1;
                    background: white;

                    font: 500 20px Noto Sans;
                    letter-spacing: 0;
                    color: #001CE2;

                    @include lt-sm {
                        padding: 10px 15px;
                        font-size: 10px;
                        height: 56px;
                    }

                    span{
                        font-weight: 600;
                        margin-left: 6px;
                        margin-right: 6px;
                    }

                    img {
                        // width: 31.12px;
                        // height: 31.12px;
                        margin-right: 18.5px;
                    }

                    img.extract {
                        width: 50.74px;
                        height: 32.74px;
                        margin-left: 34px;

                        @include lt-md {
                            margin-left: 18px;
                            height: 16px;
                            width: auto;
                        }
                    }
                }
            }

            .progress-bar-wrapper {
                margin-top: 78px;
                display: flex;
                align-items: center;
                width: 958px;

                .upload-progress-bar {
                    width: 1%;
                    height: 5px;
                    border-radius: 5px;
                    background: #081FE2;
                }

                .progress-bar-value {
                    font-weight: normal;
                    font-size: 38px;
                    text-align: left;
                    color: #081fe2;
                    margin-left: 22.5px;
                    margin-bottom:10px;
                }
            }


            .file-name {
                display: flex;
                align-items: center;
                margin-top: 32px;
                padding-bottom: 101px;
                font-size: 20px;
                color: #081fe2;

                img{
                    width:25px;
                    height:25px;
                    margin-right:15px;

                }

                img.close{
                    width:16px;
                    height:auto;
                    position: relative;
                    right: -100px;
                    margin-bottom: 5px;
                    &:hover{
                        cursor: pointer;
                    }
                }
            }

        }

        .import-results{
            margin-top: 100px;
            .title{
                display: flex;
                align-items: center;
                font-weight: 600;
                font-size: 36px;
                text-align: left;
                color: #081fe2;

                span{
                    font-weight: 300;
                }
            }

            .sections{

                width: 100%;
                height: auto;
                background: whitesmoke;
                padding: 60px 70px;
                .section{
                    display: flex;
                    align-items: flex-start;
                    border-bottom: 1px solid #EEEEEE;
                    padding-bottom: 16px;
                    padding-top: 16px;

                    .checkbox{
                        margin-right:20px;

                        img{
                            width: 35px;
                            height: 35px;
                            margin-top: 16px;
                        }
                    }


                    .section-content{
                        line-height: normal;
                        color: #777777;

                        .import-section-title{
                            display: flex;
                            align-items: center;
                            font-weight: bold;
                            font-size: 46px;
                            text-align: left;
                            text-transform: capitalize;
                            width: fit-content;

                            span{
                                &:hover{
                                    cursor: pointer;
                                }
                            }

                            img{
                                width:42px;
                                height:42px;
                                margin-left:24px;
                                opacity: 0.6;
                                filter: grayscale(100%);
                                &:hover{
                                    cursor: pointer;
                                }
                            }
                        }

                        .section-content-items{
                            .content-item{
                                display: flex;
                                color: inherit;
                                font-size: 24px;
                                text-align: left;
                                text-transform: capitalize;
                                margin-top: 22px;

                                .bold{
                                    font-weight: bold;
                                    margin-right:6px;
                                }

                            }

                        }


                        &.active{
                            color: #081fe2;
                            .import-section-title{
                                img{
                                    filter: grayscale(0%);
                                    opacity: 1;
                                }
                            }
                        }

                    }
                }
            }
        }
    }

    #cvDropZone {

        // my styles:
        /*border: darkgray dashed 1px;*/
        border:none;
        margin-top:55px;
        width:100%;
        height:219px;
        /*border-radius: 25px;*/
        margin-bottom:55px;

        background-image:
                radial-gradient(circle at 2.5px, #a9a9a9 1.25px, rgba(255,255,255,0) 2.5px),
                radial-gradient(circle, #a9a9a9 1.25px, rgba(255,255,255,0) 2.5px),
                radial-gradient(circle at 2.5px, #a9a9a9 1.25px, rgba(255,255,255,0) 2.5px),
                radial-gradient(circle, #a9a9a9 1.25px, rgba(255,255,255,0) 2.5px);
        background-position: top, right, bottom, left;
        background-size: 15px 5px, 5px 15px;
        background-repeat: repeat-x, repeat-y;



        .upload-text{
            font-size:26px;
        }

        position: relative;

        .dz-preview {
            width: 100%;
            height: 100%;
            background: none;
            display: flex;
            justify-content: center;
            align-items: center;

            .dz-details {
                padding: 50px 10px;
                height: 45%;
                display: none;
                top: auto;
                bottom: 0;
                border-radius: 5px;
                background: rgba($color: $activeColor, $alpha: .8);
            }

            .dz-progress {
                bottom: 70px;
                top: auto;
            }

            .dz-error-mark,
            .dz-success-mark {
                bottom: 40px;
            }

            .dz-image {
                background: none;
                z-index: 3;
                border-radius: 0;
                display: flex;
                justify-content: center;
                align-items: center;

                .thumbnail {
                    width: 100%;
                    height: 50%;
                    overflow: hidden;
                    background-position: center ;
                }

                embed {
                    width: calc(100% + 15px);
                    height: 100%;
                    overflow:hidden !important;
                }
            }

            .dz-remove {
                bottom: 20px;
                top: auto;
                border-radius: 5px;
                margin: 0;
                color: $activeColor;
                border-color: $activeColor;
            }
        }

        .dz-image img {
            width: 100%;
            height: auto;
        }

        .dz-image-preview .dz-details,
        .dz-preview .dz-details {
            // background: rgba($color: $activeColor, $alpha: .8);
            // background: none;
        }
    }
</style>
