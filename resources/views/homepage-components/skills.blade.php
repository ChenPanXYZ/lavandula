<section class = "main-section content" id = "skills">
        <h2><?php echo __("My Skills"); ?></h2>
        <div id = "skill-buttons">
            <div class = "icon-arrow-left" id="skills-previous-page-button"></div>
            <div class = "icon-arrow-right" id="skills-next-page-button"></div>
        </div>
        <div class = "skill-type" id = "programming-languages">
            <h4 style = "text-align: center;"><?php echo __("Programming Languages"); ?></h4>
        </div>

        <div class = "skill-type" id = "framework-library">
            <h4 style = "text-align: center;"><?php echo __("Frameworks/Libraries"); ?></h4>
        </div>

        <div class = "skill-type" id = "database">
            <h4 style = "text-align: center;"><?php echo __("Database"); ?></h4>
        </div>

        <div class = "skill-type" id = "tools">
            <h4 style = "text-align: center;"><?php echo __("Tools"); ?></h4>
        </div>

        <div class = "skill-type" id = "operating-system">
            <h4 style = "text-align: center;"><?php echo __("Operating System"); ?></h4>
        </div>

        <div class = "skill-type" id = "languages">
            <h4 style = "text-align: center;"><?php echo __("Languages"); ?></h4>
        </div>
        <div style = "text-align: center">
        <div class = "icon-arrow-down" id="skills-more-page-button"><?php echo __("MORE"); ?></div>
        </div>
</section>

<style>
#skills * {
    box-sizing: border-box;
}


#skill-buttons {
    text-align: center;
}

#skills-previous-page-button, #skills-next-page-button, #skills-more-page-button {
    display: inline-block;
    margin-bottom: 15px;
    cursor: grab;
}
#skills-next-page-button {
    float: right;
}

#skills-previous-page-button {
    float: left;
}

.skill-type {
    display: none;
}
.skill-type:nth-child(3) {
    display: block;
}
.skill {
    display: none;
}

.skill:nth-child(-n+7) {
    display: block;
}

.skill {
    margin: 10px;
}
.skill-name {
    display: block;
    font-style: italic;
}
.skill-value-wrapper {
    width: 100%;
    background: #ddd;
}

.skill-value {
    display: inline-block;
    text-align: right;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-right: 5px;
    color: #fffffb;
    line-height: 20px;
}
@media (min-width: 900px) {
    .skill-value {
        padding-right: 15px;
        line-height: 37px;
    }
}
</style>
<script>
let skills
if(document.documentElement.lang == "zh-TW") {
    skills = {
        programmingLanguages: [
            {name: "C", value: 85, color: "#4D5139"},
            {name: "C++", value: 70, color: "#B54434"},
            {name: "C#", value: 30, color: "#FB966E"},
            {name: "Python", value: 80, color: "#90B44B"},
            {name: "Java", value: 75, color: "#00896C"},
            {name: "HTML / CSS", value: 90, color: "#6699A1"},
            {name: "JavaScript", value: 90, color: "#261E47"},
            {name: "NodeJS", value: 90, color: "#8A6BBE"},
            {name: "PHP", value: 70, color: "#707C74"},
            {name: "SQL", value: 85, color: "#0C0C0C"},
            {name: "R", value: 30, color: "#3A3226"}
        ],
        frameworkLibrary: [
            {name: "JQuery", value: 100, color: "#4D5139"},
            {name: "Bootstrap", value: 70, color: "#B54434"},
            {name: "Express.js", value: 90, color: "#FB966E"},
            {name: "TensorFlow.js", value: 20, color: "#90B44B"},
            {name: "PoseNet.js", value: 25, color: "#00896C"},
            {name: "React", value: 80, color: "#261E47"},
            {name: "Socket.IO", value: 70, color: "#0C0C0C"},
            {name: "Laravel", value: 85, color: "#3A3226"},
        ],
        tools: [
            {name: "Git", value: 80, color: "#4D5139"},
            {name: "Google Cloud", value: 50, color: "#B54434"},
            {name: "AWS", value: 60, color: "#FB966E"},
            {name: "Jupyter", value: 50, color: "#90B44B"},
            {name: "Apache", value: 85, color: "#00896C"},
            {name: "IntelliJ IDEA", value: 75, color: "#6699A1"},
            {name: "MongoDB Atlas", value: 75, color: "#261E47"},
            {name: "phpMyAdmin", value: 80, color: "#8A6BBE"},
            {name: "MongoDB Compass", value: 80, color: "#707C74"},
            {name: "Postman", value: 90, color: "#0C0C0C"}
        ],
        operatingSystem: [
            {name: "Windows", value: 100, color: "#4D5139"},
            {name: "Ubuntu", value: 70, color: "#F17C67"}
        ],
        database: [
            {name: "MySQL", value: 90, color: "#4D5139"},
            {name: "MongoDB", value: 90, color: "#F17C67"},
        ],
        languages: [
            {name: "漢語", value: 100, color: "#4D5139"},
            {name: "英語", value: 75, color: "#F17C67"},
            {name: "日本語", value: 20, color: "#EB7A77"},
        ]
    }   
}
else if(document.documentElement.lang == "zh-CN") {
    skills = {
        programmingLanguages: [
            {name: "C", value: 85, color: "#4D5139"},
            {name: "C++", value: 70, color: "#B54434"},
            {name: "C#", value: 30, color: "#FB966E"},
            {name: "Python", value: 80, color: "#90B44B"},
            {name: "Java", value: 75, color: "#00896C"},
            {name: "HTML / CSS", value: 90, color: "#6699A1"},
            {name: "JavaScript", value: 90, color: "#261E47"},
            {name: "NodeJS", value: 90, color: "#8A6BBE"},
            {name: "PHP", value: 70, color: "#707C74"},
            {name: "SQL", value: 85, color: "#0C0C0C"},
            {name: "R", value: 30, color: "#3A3226"}
        ],
        frameworkLibrary: [
            {name: "JQuery", value: 100, color: "#4D5139"},
            {name: "Bootstrap", value: 70, color: "#B54434"},
            {name: "Express.js", value: 90, color: "#FB966E"},
            {name: "TensorFlow.js", value: 20, color: "#90B44B"},
            {name: "PoseNet.js", value: 25, color: "#00896C"},
            {name: "React", value: 80, color: "#261E47"},
            {name: "Socket.IO", value: 70, color: "#0C0C0C"},
            {name: "Laravel", value: 85, color: "#3A3226"},
        ],
        tools: [
            {name: "Git", value: 80, color: "#4D5139"},
            {name: "Google Cloud", value: 50, color: "#B54434"},
            {name: "AWS", value: 60, color: "#FB966E"},
            {name: "Jupyter", value: 50, color: "#90B44B"},
            {name: "Apache", value: 85, color: "#00896C"},
            {name: "IntelliJ IDEA", value: 75, color: "#6699A1"},
            {name: "MongoDB Atlas", value: 75, color: "#261E47"},
            {name: "phpMyAdmin", value: 80, color: "#8A6BBE"},
            {name: "MongoDB Compass", value: 80, color: "#707C74"},
            {name: "Postman", value: 90, color: "#0C0C0C"}
        ],
        operatingSystem: [
            {name: "Windows", value: 100, color: "#4D5139"},
            {name: "Ubuntu", value: 70, color: "#F17C67"}
        ],
        database: [
            {name: "MySQL", value: 90, color: "#4D5139"},
            {name: "MongoDB", value: 90, color: "#F17C67"},
        ],
        languages: [
            {name: "汉语", value: 100, color: "#4D5139"},
            {name: "英语", value: 75, color: "#F17C67"},
            {name: "日本语", value: 20, color: "#EB7A77"},
        ]
    }   
}
else {
    skills = {
        programmingLanguages: [
            {name: "C", value: 85, color: "#4D5139"},
            {name: "C++", value: 70, color: "#B54434"},
            {name: "C#", value: 30, color: "#FB966E"},
            {name: "Python", value: 80, color: "#90B44B"},
            {name: "Java", value: 75, color: "#00896C"},
            {name: "HTML / CSS", value: 90, color: "#6699A1"},
            {name: "JavaScript", value: 90, color: "#261E47"},
            {name: "NodeJS", value: 90, color: "#8A6BBE"},
            {name: "PHP", value: 70, color: "#707C74"},
            {name: "SQL", value: 85, color: "#0C0C0C"},
            {name: "R", value: 30, color: "#3A3226"}
        ],
        operatingSystem: [
            {name: "Windows", value: 100, color: "#4D5139"},
            {name: "Ubuntu", value: 70, color: "#F17C67"}
        ],
        frameworkLibrary: [
            {name: "JQuery", value: 100, color: "#4D5139"},
            {name: "Bootstrap", value: 70, color: "#B54434"},
            {name: "Express.js", value: 90, color: "#FB966E"},
            {name: "TensorFlow.js", value: 20, color: "#90B44B"},
            {name: "PoseNet.js", value: 25, color: "#00896C"},
            {name: "React", value: 80, color: "#261E47"},
            {name: "Socket.IO", value: 70, color: "#0C0C0C"},
            {name: "Laravel", value: 85, color: "#3A3226"},
        ],
        tools: [
            {name: "Git", value: 80, color: "#4D5139"},
            {name: "Google Cloud", value: 50, color: "#B54434"},
            {name: "AWS", value: 60, color: "#FB966E"},
            {name: "Jupyter", value: 50, color: "#90B44B"},
            {name: "Apache", value: 85, color: "#00896C"},
            {name: "IntelliJ IDEA", value: 75, color: "#6699A1"},
            {name: "MongoDB Atlas", value: 75, color: "#261E47"},
            {name: "phpMyAdmin", value: 80, color: "#8A6BBE"},
            {name: "MongoDB Compass", value: 80, color: "#707C74"},
            {name: "Postman", value: 90, color: "#0C0C0C"}
        ],
        database: [
            {name: "MySQL", value: 90, color: "#4D5139"},
            {name: "MongoDB", value: 90, color: "#F17C67"},
        ],
        languages: [
            {name: "Chinese", value: 100, color: "#4D5139"},
            {name: "English", value: 75, color: "#F17C67"},
            {name: "Japanese", value: 20, color: "#EB7A77"},
        ]
    }
}

function skillElementMaker(skill) {
    let skillElement = document.createElement("div");
    skillElement.setAttribute("class", "skill");
    let skillNameElement = document.createElement("div");
    skillNameElement.setAttribute("class", "skill-name");

    let skillValueWrapperElement = document.createElement("div");
    skillValueWrapperElement.setAttribute("class", "skill-value-wrapper");

    let skillValueElement = document.createElement("div");
    skillValueElement.setAttribute("class", "skill-value");
    skillValueElement.textContent = skill.value + "%";
    skillNameElement.textContent = skill.name;
    skillValueElement.style.width = skill.value + "%";
    skillValueElement.style.background = "var(--secondary-background-color)";

    skillValueWrapperElement.appendChild(skillValueElement)
    skillElement.appendChild(skillNameElement);
    skillElement.appendChild(skillValueWrapperElement);

    return skillElement;
}
let programmingLanguagesElement = document.getElementById("programming-languages")
let programmingLanguages = skills.programmingLanguages;
for(let i = 0; i < programmingLanguages.length; i++) {
    let skill = programmingLanguages[i]
    let skillElement = skillElementMaker(skill);
    programmingLanguagesElement.appendChild(skillElement);
}


let operatingSystemElement = document.getElementById("operating-system")
let operatingSystem = skills.operatingSystem;
for(let i = 0; i < operatingSystem.length; i++) {
    let skill = operatingSystem[i]
    let skillElement = skillElementMaker(skill);
    operatingSystemElement.appendChild(skillElement);
}

let skillsElement = document.getElementById("languages")
let languages = skills.languages;
for(let i = 0; i < languages.length; i++) {
    let skill = languages[i];
    let skillElement = skillElementMaker(skill);
    skillsElement.appendChild(skillElement);
}

skillsElement = document.getElementById("framework-library")
let frameworkLibrary = skills.frameworkLibrary;
for(let i = 0; i < frameworkLibrary.length; i++) {
    let skill = frameworkLibrary[i];
    let skillElement = skillElementMaker(skill);
    skillsElement.appendChild(skillElement);
}

skillsElement = document.getElementById("tools")
let tools = skills.tools;
for(let i = 0; i < tools.length; i++) {
    let skill = tools[i];
    let skillElement = skillElementMaker(skill);
    skillsElement.appendChild(skillElement);
}

skillsElement = document.getElementById("database")
let database = skills.database;
for(let i = 0; i < database.length; i++) {
    let skill = database[i];
    let skillElement = skillElementMaker(skill);
    skillsElement.appendChild(skillElement);
}
</script>

<script>
    const maxSkillPage = 6;
    let currentPage = 1;
    let skillTypeElements = document.querySelectorAll(".skill-type")
    document.getElementById("skills-previous-page-button").addEventListener("click", goToPreviousSkillPage);
    function goToPreviousSkillPage() {
        let skillTypeElement = skillTypeElements[currentPage - 1];
        let skillElement = skillTypeElement.querySelectorAll(".skill");
        for(let i = 0; i < skillElement.length; i++) {
            if(i > 5) {
                skillElement[i].style.display = "none";
            }
            document.getElementById("skills-more-page-button").style.display = "inline-block";
        }
        if(currentPage == 1) {
            currentPage = maxSkillPage
        }
        else {
            currentPage -= 1
        }
        if(currentPage === 1 || currentPage === 2) document.getElementById("skills-more-page-button").style.display = "inline-block";
            else document.getElementById("skills-more-page-button").style.display = "none";
        for(let i = 0; i < skillTypeElements.length; i++) {
            let skillTypeElement = skillTypeElements[i]
            if(i != (currentPage - 1)) {
                skillTypeElement.style.display = "none";
            }
            else {
                skillTypeElement.style.display = "block";
            }
        }
    }

    document.getElementById("skills-next-page-button").addEventListener("click", goToNextSkillPage);
    function goToNextSkillPage() {
        let skillTypeElement = skillTypeElements[currentPage - 1];
        let skillElement = skillTypeElement.querySelectorAll(".skill");
        for(let i = 0; i < skillElement.length; i++) {
            if(i > 5) {
                skillElement[i].style.display = "none";
            }
        }

        if(currentPage == maxSkillPage) {
            currentPage = 1
        }
        else {
            currentPage += 1
        }

        if(currentPage === 1 || currentPage === 2) document.getElementById("skills-more-page-button").style.display = "inline-block";
            else document.getElementById("skills-more-page-button").style.display = "none";

        for(let i = 0; i < skillTypeElements.length; i++) {
            let skillTypeElement = skillTypeElements[i]
            if(i != (currentPage - 1)) {
                skillTypeElement.style.display = "none";
            }
            else {
                skillTypeElement.style.display = "block";
            }
        }
    }

    document.getElementById("skills-more-page-button").addEventListener("click", ShowMoreSkills);
    function ShowMoreSkills() {
        let skillTypeElement = skillTypeElements[currentPage - 1];
        let skillElement = skillTypeElement.querySelectorAll(".skill");
        for(let i = 0; i < skillElement.length; i++) {
            skillElement[i].style.display = "block";
            document.getElementById("skills-more-page-button").style.display = "none";
        }
    }
</script>