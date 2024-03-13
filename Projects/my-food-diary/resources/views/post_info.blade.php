<div class="photo-details">
    <div class="photo"><img src="https://picsum.photos/300/200?image=12" /></div>
    <div class="avatar"><img src="https://picsum.photos/50/50?image=12" /></div>
    <div class="author">John Smith</div>
    <div class="date">2018-10-03</div>
    <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
    <div class="like">&hearts;</div>
</div>


<style>
    body {
        font-family: Arial;
    }

    .photo-details {

        /* grid */

        max-width: 800px;
        display: grid;
        grid-template-columns: 50% min-content 1fr max-content;
        grid-template-rows: 0 min-content 1fr min-content;
        grid-gap: 10px;
        align-items: center;
        grid-template-areas:
    "photo . . ." /* add padding */
		"photo avatar author date"
		"photo . description description"
		"photo . . like";

        @media (max-width: 700px) {
            grid-template-columns: min-content 1fr 1fr;
            grid-template-areas:
      ". . ." /* add padding */
			"avatar author author"
			"photo photo photo"
			"description description description"
			"date date like";
            padding: 0;
        }

        .photo { grid-area: photo; align-self: start; }
        .description { grid-area: description; }
        .avatar { grid-area: avatar; }
        .author { grid-area: author; }
        .date { grid-area: date; }
        .like { grid-area: like; justify-self: right; }

        /* styling */

    //> * { outline: 1px solid black; }
        border: 1px solid #e8e8e8;
        box-shadow: 0 0 8px 0px #dcdcdc;
        padding-right: 10px;

        .photo, .photo img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        .avatar img {
            border-radius: 50%;
        }
        .author {
            font-size: 20px;
            color: #706ac1;
        }
        .date {
            font-size: 13px;
            color: #999;
        }
        .description {
            font-size: 16px;
        }
        .like {
            font-size: 30px;
        }

        @media (max-width: 700px) {
            .avatar, .description, .date { padding-left: 10px; }
            .description, .like { padding-right: 10px; }
        }
    }

</style>
