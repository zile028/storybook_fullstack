class Year {
    constructor(year, wishes) {
        this.year = year;
        this.wishes = wishes.join(",");
    }

    sayCongrats = () => {
        console.log(`Happy new ${this.year} year`);
        console.log(`Wish you ${this.wishes}!`);
    };
}

let happy = new Year(2023, ["happiness", "success", "luck"]);
happy.sayCongrats();