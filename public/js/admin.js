let resume_sections = document.getElementsByClassName("resume-section")

function checking(el) {
	el.checked = true;
}

$(document).on('click', '.move-down-button', function (e) {
	e.preventDefault();
	if(typeof $(this).parent().next().children()[2] == 'undefined') {
		alert("It's already at the bottom!")
		return;
	}

	$(this).parent().children()[2].value = parseInt($(this).parent().children()[2].value) + 1;
	$(this).parent().children()[3].checked = true;


	$(this).parent().next().children()[2].value = parseInt($(this).parent().children()[2].value) - 1;

	$(this).parent().next().children()[3].checked = true;


	$(this).parent().next().after($(this).parent());

	update_resume();
});
$(document).on('click', '.move-up-button', function (e) {
	e.preventDefault();
	if($(this).parent().children()[2].value == 1) {
		alert("It's already at the top!")
		return;
	}
	$(this).parent().children()[2].value = parseInt($(this).parent().children()[2].value) - 1;
	$(this).parent().children()[3].checked = true;

	$(this).parent().prev().children()[2].value = parseInt($(this).parent().children()[2].value) + 1;

	$(this).parent().prev().children()[3].checked = true;
	$(this).parent().prev().before($(this).parent());
	update_resume();
});



// Delete Sections
$(document).on('click', '.delete-section-button', function (event) {
	event.preventDefault();
});
function delete_section(el, section_id, order) {
	$.ajax({
		type: "delete",
		url: 'api/resume',
		data: {id: section_id, order: order, type: 0, api_token: api_token},
		success: function(html) {
			delete_section_from_screen(el.parentNode.parentNode, el.parentNode, order)
			//el.parentNode.parentNode.removeChild(el.parentNode);

		}

	});
}
function delete_section_from_screen(parent, removedSection, order) {
	parent.removeChild(removedSection)
	sections = parent.querySelectorAll('.resume-section');
	for (let i = order - 1 ; i < sections.length; i++) {
		let section = sections[i]
		let order = section.querySelector('.resume-section-order')
		order.setAttribute('value', order.value - 1)
	}
}
// Delete Items
$(document).on('click', '.delete-item-button', function (event) {
	event.preventDefault();
});
function delete_item(el, item_id, order) {
	$.ajax({
		type: "delete",
		url: 'api/resume',
		data: {id: item_id, order: order, type: 1, api_token: api_token},
		success: function(html) {
			delete_item_from_screen(el.parentNode.parentNode, el.parentNode, order)
		}
	});
}

function delete_item_from_screen(parent, removedItem, order) {
	parent.removeChild(removedItem);
	items = parent.querySelectorAll('.resume-section-item');
	for (let i = order - 1 ; i < items.length; i++) {
		let item = items[i];
		let order = item.querySelector('.resume-section-item-order')
		order.setAttribute('value', order.value - 1)
	}
}


// Delete Content
$(document).on('click', '.delete-content-button', function (event) {
	event.preventDefault();
});
function delete_content(el, content_id, order) {
	
	$.ajax({
		type: "delete",
		url: 'api/resume',
		data: {id: content_id, order: order, type: 2, api_token: api_token},
		success: function(html) {
			delete_content_from_screen(el.parentNode.parentNode, el.parentNode, order)
		}

	});
}

function delete_content_from_screen(parent, removedContent, order) {
	parent.removeChild(removedContent);
	contents = parent.querySelectorAll('.resume-section-item-content');
	for (let i = order - 1 ; i < contents.length; i++) {
		let content = contents[i];
		let order = content.querySelector('.resume-section-item-content-order')
		order.setAttribute('value', order.value - 1)
	}
}


// Add Section
$(document).on('click', '.addNewSection', function (event) {
	event.preventDefault();
});
function addSection() {
	let temp = "addNewSection";
	var section = document.getElementById(temp);
	$.ajax({
		type:"post",
		url:'api/resume',
		data: {title: section.value, type: 0, api_token: api_token},
		success: function(html){
			$(section).parent().before($.parseHTML(html))
			section.value = ""
		}
	})
}


// Add Item
$(document).on('click', '.addNewItem', function (event) {
	event.preventDefault();
});

function addItem(sectionId) {
	let temp = "newItemAddedToResumeSection-" + sectionId;
	var item = document.getElementById(temp);
	$.ajax({
		type:"post",
		url:'api/resume',
		data: {sectionId: sectionId, title: item.value, type: 1, api_token: api_token},
		headers: {"Authorization": 'Bearer '.$token},
		success: function(html){
			$(item).parent().before($.parseHTML(html));
			item.value = "";
		}
	});
}


// Add Content
$(document).on('click', '.addNewSectionItemContent', function (event) {
	event.preventDefault();
});

function addNewContent(itemId) {
	let temp = "newContentAddedToResumeSectionItem-" + itemId;
	var content = document.getElementById(temp);
	$.ajax({
		type:"post",
		url:'api/resume',
		data: {itemId: itemId, content: content.value, type: 2, api_token: api_token},
		success: function(html){
			$(content).parent().before($.parseHTML(html));
			content.value = "";
		}
	});
}


// Update Resume
$(document).on('click', '.update-button', function (event) {
	event.preventDefault();
});

function update_resume() {
	var resumeSectionCheckbox = $('input[name="resumeSectionCheckbox[]"]:checked').map(function(){
		this.checked = false;
		return this.value;
	}).get()

    var resumeSectionItemCheckbox = $('input[name="resumeSectionItemCheckbox[]"]:checked').map(function(){
		this.checked = false;
        return this.value;
    }).get()

    var resumeSectionItemContentCheckbox = $('input[name="resumeSectionItemContentCheckbox[]"]:checked').map(function(){
		this.checked = false;
        return this.value;
    }).get()

	var resumeSections = {};
	for(var i = 0 ; i < resumeSectionCheckbox.length; i++) {
		resumeSectionId = resumeSectionCheckbox[i];
		resumeSectionTagName = "resumeSectionTitles-" + resumeSectionId.toString();
		var resumeSection = $('textarea[name="' + resumeSectionTagName + '"]')
		title = resumeSection.val()
		resumeSectionOrderTagName = "resumeSectionOrder-" + resumeSectionId.toString();
		var resumeSectionOrder = $('input[name="' + resumeSectionOrderTagName + '"]')
		display_order = resumeSectionOrder.val()
		resumeSections[resumeSectionId] = [title, display_order]
	}

	

	var resumeItems = {};
	for(var i = 0 ; i < resumeSectionItemCheckbox.length; i++) {
		resumeSectionItemId = resumeSectionItemCheckbox[i];
		resumeSectionItemTagName = "resumeSectionItemTitles-" + resumeSectionItemId.toString();
		var resumeSectionItem = $('textarea[name="' + resumeSectionItemTagName + '"]')
		title = resumeSectionItem.val()
		resumeSectionItemOrderTagName = "resumeSectionItemOrder-" + resumeSectionItemId.toString();
		var resumeSectionItemOrder = $('input[name="' + resumeSectionItemOrderTagName + '"]')
		display_order = resumeSectionItemOrder.val()
		resumeItems[resumeSectionItemId] = [title, display_order]
	}

	var resumeContents = {};
	for(var i = 0 ; i < resumeSectionItemContentCheckbox.length; i++) {
		resumeSectionItemContentId = resumeSectionItemContentCheckbox[i];
		resumeSectionItemContentTagName = "resumeSectionItemContent-" + resumeSectionItemContentId.toString();
		var resumeSectionItemContent = $('textarea[name="' + resumeSectionItemContentTagName + '"]')
		title = resumeSectionItemContent.val()
		resumeSectionItemContentOrderTagName = "resumeSectionItemContentOrder-" + resumeSectionItemContentId.toString();
		var resumeSectionItemContentOrder = $('input[name="' + resumeSectionItemContentOrderTagName + '"]')
		display_order = resumeSectionItemContentOrder.val()
		resumeContents[resumeSectionItemContentId] = [title, display_order]
	}

	$.ajax({
		type:"put",
		url:'api/resume',
		data: {resumeSectionCheckbox: resumeSectionCheckbox, resumeSectionItemCheckbox: resumeSectionItemCheckbox, resumeSectionItemContentCheckbox: resumeSectionItemContentCheckbox, resumeSections: resumeSections, resumeItems: resumeItems, resumeContents: resumeContents, api_token: api_token},
		success: function(html){
		}
	});
}



$(document).on('click', '.expand-collapse-button', function (event) {
	event.preventDefault();
});

function expand_collapse(el, button) {

	if(el.classList.contains("expand")) {
		el.classList.remove("expand");
		el.classList.add("collapse");
		button.innerHTML = "Expand";
	}
	else {
		el.classList.add("expand");
		el.classList.remove("collapse");
		button.innerHTML = "Collapse";
	}
}






$(document).on('click', "#show-unapproved-comments", function (event) {
	event.preventDefault();
	document.getElementById("unapproved-comments").style.display = "block";
	document.getElementById("approved-comments").style.display = "none";
	document.getElementById("approve-button").style.display = "inline-block";
	document.getElementById("unapprove-button").style.display = "none";
	document.getElementById("show-unapproved-comments").style.backgroundColor = "#4D5139";
	document.getElementById("show-approved-comments").style.backgroundColor = "#6c757d";
});

$(document).on('click', "#show-approved-comments", function (event) {
	event.preventDefault();
	document.getElementById("unapproved-comments").style.display = "none";
	document.getElementById("approved-comments").style.display = "block";
	document.getElementById("approve-button").style.display = "none";
	document.getElementById("unapprove-button").style.display = "inline-block";
	document.getElementById("show-unapproved-comments").style.backgroundColor = "#6c757d";
	document.getElementById("show-approved-comments").style.backgroundColor = "#4D5139";
});


$(document).on('click', '.comment', function(event) {
	let checkbox = this.querySelector(".comment-checkbox");
	if(checkbox.checked) {
		checkbox.checked = false;
		this.style.borderColor = "rgba(0, 0, 0, 0.125)";
	}
	else {
		checkbox.checked = true;
		this.style.borderColor = "#4D5139";
	}
})



function update_comments(type) {
	let commentCheckbox = $('input[name="commentCheckbox[]"]:checked').map(function(){
		this.checked = false;
		return this.value;
	}).get()



	let comments = [];
	for(let i = 0 ; i < commentCheckbox.length; i++) {
		commentId = commentCheckbox[i];
		comments.push(commentId)
	}

	if(type === 1) {
		$.ajax({
			type:"put",
			url:'/api/comment',
			data: {comments: comments, status: 't', api_token: api_token},
			success: function(html){
				location.reload();
			}
		});	
	}
	else if (type === 2) {
		$.ajax({
			type:"put",
			url:'/api/comment',
			data: {comments: comments, status: 'f', api_token: api_token},
			success: function(html){
				location.reload();
			}
		});	
	}
	else if (type === 3) {
		$.ajax({
			type:"delete",
			url:'/api/comment',
			data: {comments: comments, api_token: api_token},
			success: function(html){
				location.reload();
			}
		});	
	}
}
