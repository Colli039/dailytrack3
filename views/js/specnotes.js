console.log("Welcome to the Specialist Notes Page");
shownote();

function check_web_storage_support() {
    if(typeof(Storage) !== "undefined") {
        return(true);
    }
    else {
        alert("Web storage unsupported!");
        return(false);
    }
}

function display_saved_note() {
  if(check_web_storage_support() == true) {
      result = localStorage.getItem('note');
  }
  if(result === null) {
      result = "No note saved";
  }
  document.getElementById('area').value = result;
}

function save() {
  if(check_web_storage_support() == true) {
      var area = document.getElementById("area");
      if(area.value != '') {
          localStorage.setItem("note", area.value);
      }
      else {
          alert("Nothing to save");
      }
  }
}

function clear() {
  document.getElementById('area').value = "";
}


// Function to show elements from localStorage
function shownote() {
  let note = localStorage.getItem("note");
  if (note == null) {
    noteObj = [];
  } else {
    noteObj = JSON.parse(note);
  }
  let html = "";
  noteObj.forEach(function (element, index) {
    html += `
              <div class="noteCard my-2 mx-2 card" style="width: 18rem;max-height: 200px;
              text-overflow: ellipsis;
              overflow: hidden;">

                      <div class="card-body">
                          <h5 class="card-title">Entry ${index + 1}</h5>
                          <p>08 / 17 / 2022  |  10: 02 AM</p>
                          <p class="card-text"> ${element}</p>
                          <button id="${index}"onclick="deleteStory(this.id)" class="btn-primary" 
                          style="padding:10px;font-size:13px;border-radius: 20px;">Delete Entry</button>
                      </div>
                  </div>`;
  });
  let noteElm = document.getElementById("note");
  if (noteObj.length != 0) {
    noteElm.innerHTML = html;
  } else {
    noteElm.innerHTML = `Nothing to show! Use the "Write Entry" section above to write your note.`;
  }
}

//   // Function to delete an entry <hr style="background-color: pink; display: block;  width: 40px;  height: 2px;">
function deleteStory(index) {
  //   console.log("I am deleting", index);

  let note = localStorage.getItem("note");
  if (note == null) {
    noteObj = [];
  } else {
    noteObj = JSON.parse(note);
  }

  noteObj.splice(index, 1);
  localStorage.setItem("note", JSON.stringify(noteObj));
  shownote();
}


let search = document.getElementById('searchTxt');
search.addEventListener("input", function () {

  let inputVal = search.value.toLowerCase();
  // console.log('Input event fired!', inputVal);
  let storyCards = document.getElementsByClassName('noteCard');
  Array.from(storyCards).forEach(function (element) {
    let cardTxt = element.getElementsByTagName("p")[0].innerText;
    if (cardTxt.includes(inputVal)) {
      element.style.display = "block";
    }
    else {
      element.style.display = "none";
    }
    // console.log(cardTxt);
  })
})