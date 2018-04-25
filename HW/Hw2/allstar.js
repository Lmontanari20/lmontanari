var team_L = ["Lebron James", 
            "DeMarcus Cousins",
            "Anthony Davis",
            "Kevin Durant",
            "Kyrie Irving",
            "LaMarcus Aldridge",
            "Bradley Beal",
            "Goran Dragic",
            "Andre Drummond",
            "Paul George",
            "Kevin Love",
            "Victor Oladipo",
            "Kristap Porzingis",
            "Kemba Walker",
            "John Wall",
            "Russel Westbrook"];
            
var team_S = ["Giannis Antetokounmpo",
            "Stephen Curry",
            "DeMar DeRozan",
            "Joel Embiid",
            "James Harden",
            "Jimmy Butler",
            "Draymond Green",
            "Al Horford", 
            "Damian Lillard",
            "Kyle Lowry",
            "Klay Thompson",
            "Karl-Anthony Towns"];
var sizeL = 15;
var sizeS = 15;

function lebron_start5() {
    var l_start5 = [];
    for (var i = 0; i < 5; i++) {
        var index = Math.floor(Math.random() * sizeL);
        l_start5.push(team_L[index]);
        team_L.splice(index, 1);
        sizeL--;
    }
    return l_start5;
     
}

function steph_start5() {
    var s_start5 = [];
    for (var i = 0; i < 5; i++) {
        var index = Math.floor(Math.random() * sizeL);
        s_start5.push(team_S[index]);
        team_S.splice(index, 1);
        sizeS--;
    }
    return s_start5;
     
}

function printStart5() {
    var lebron = lebron_start5();
    var steph = steph_start5();
    for (var ii = 0; ii < 5; ii++){
        $("#start5").append("<tr><td>" + lebron[ii] + "</td><td>"+ steph[ii] + "</td></tr>");
    }
}