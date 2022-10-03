console.log("Welcome to DailyTrack Journal");
showentries();

// If user adds a story, add it to the localStorage
let addBtn = document.getElementById("addBtn");
addBtn.addEventListener("click", function (e) {
  let addTxt = document.getElementById("addTxt");
  let entries = localStorage.getItem("entries");
  if (entries == null) {
    entriesObj = [];
  } else {
    entriesObj = JSON.parse(entries);
  }
  entriesObj.push(addTxt.value);
  localStorage.setItem("entries", JSON.stringify(entriesObj));
  addTxt.value = ""; //to make the text blank after clicking the button
  console.log(entriesObj);
  showentries();
});


// Function to show elements from localStorage
function showentries() {
  let entries = localStorage.getItem("entries");
  if (entries == null) {
    entriesObj = [];
  } else {
    entriesObj = JSON.parse(entries);
  }
  let html = "";
  entriesObj.forEach(function (element, index) {
    html += `
              <div class="noteCard my-2 mx-2 card" style="width: 18rem;max-height: 200px;
              text-overflow: ellipsis;
              overflow: hidden;">

                      <div class="card-body">
                          <h5 class="card-title">Entry ${index + 1}</h5>
                          <p>08 / 22 / 2022  |  11: 32 AM</p>
                          <p class="card-text"> ${element}</p>
                          <button id="${index}"onclick="deleteStory(this.id)" class="btn-primary" 
                          style="padding:10px;font-size:13px;border-radius: 20px;">Delete Entry</button>
                      </div>
                  </div>`;
  });
  let entriesElm = document.getElementById("entries");
  if (entriesObj.length != 0) {
    entriesElm.innerHTML = html;
  } else {
    entriesElm.innerHTML = `Nothing to show! Use the "Write Entry" section above to write your entries.`;
  }
}

//   // Function to delete an entry <hr style="background-color: pink; display: block;  width: 40px;  height: 2px;">
function deleteStory(index) {
  //   console.log("I am deleting", index);

  let entries = localStorage.getItem("entries");
  if (entries == null) {
    entriesObj = [];
  } else {
    entriesObj = JSON.parse(entries);
  }

  entriesObj.splice(index, 1);
  localStorage.setItem("entries", JSON.stringify(entriesObj));
  showentries();
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