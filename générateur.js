
function genererCombattant() {
  // Tableau contenant les combattants avec leur nom et leur image
    let combattants = [
      { 
        nom: "Conor McGregor",
        image: "https://images.rtl.fr/~c/2000v2000/rtl/www/1413100-conor-mcgregor-le-26-aout-2017-a-las-vegas-nevada.jpg"
      },
      { 
        nom: "Jon Jones",
        image: "https://static.cnews.fr/sites/default/files/styles/image_750_422/public/ufc_le_prix_mirobolant_dune_carte_de_jon_jones_vendue_aux_encheres_64761302aa623.jpg?itok=OYH449dF"
      },
      { 
        nom: "Khabib Nurmagomedov",
        image: "https://images.bfmtv.com/kA6-RWPhA63kXvKnGYdnSRmxTng=/0x115:2048x1267/images/Khabib-Nurmagomedov-a-lUFC-990313.jpg"
      },
      { 
        nom: "Anderson Silva",
        image: "https://www.actumma.com/wp-content/uploads/2020/08/Anderson-Silva-UFC-scaled.jpg"
      },
      { 
        nom: "Georges St-Pierre",
        image: "https://www.actumma.com/wp-content/uploads/2017/08/320_Georges_St-Pierre_vs_Johny_Hendricks_gallery_post.0.jpg"
      },
      { 
        nom: "Amanda Nunes",
        image: "https://e0.365dm.com/23/06/2048x1152/skysports-amanda-nunes-ufc_6183950.jpg"
      },
      { 
        nom: "Israel Adesanya",
        image: "https://sportnewsafrica.com/wp-content/uploads/2022/07/Israel-Adesanya.webp"
      },
      { 
        nom: "Valentina Shevchenko",
        image: "https://boxemag.com/wp-content/uploads/2023/01/Valentina-Shevchenko-vs-Alexa-Grasso-ajoute-a-lUFC-285.webp"
      },
      { 
        nom: "Max Holloway",
        image: "https://static.wixstatic.com/media/653fb2_e97741f37dee434998a044c0493fb1a9~mv2.webp"
      },
      { 
        nom: "Stipe Miocic",
        image: "https://www.lequipe.fr/_medias/img-photo-jpg/stipe-miocic-reste-au-sommet-de-la-categorie-des-poids-lourds-de-l-ufc-jerome-miron-usa-today-spor/1500000001367342/68:236,1895:1454-828-552-75/c8aa1.jpg"
      },
      { 
        nom: "Cyril Gane",
        image: "https://www.leparisien.fr/resizer/GtrxBLDPy-sXigowDWR9k4wLws8=/932x582/cloudfront-eu-central-1.images.arcpublishing.com/leparisien/6IDFM3NW7BGCFKBXQJ4PEBMSVE.jpg"
      }
    ];
     // Sélectionner un index aléatoire dans le tableau des combattants
    let randomIndex = Math.floor(Math.random() * combattants.length);// Générer un index aléatoire en fonction de la longueur du tableau des combattants
    let combattant = combattants[randomIndex];// Sélectionner un combattant aléatoire en utilisant l'index généré
    document.getElementById("combattant").textContent = combattant.nom;// Afficher le nom du combattant dans un élément HTML ayant l'ID "combattant"
    document.getElementById("image").src = combattant.image;// Afficher l'image du combattant dans un élément HTML ayant l'ID "image"
  }
