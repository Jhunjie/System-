<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .stars span {
            cursor: pointer;
            font-size: 24px;
        }
        .btn-container {
            margin-top: 15px;
        }
    </style>
    <script>
        function setRating(el, value) {
            document.getElementById("starRating").value = value;
            let stars = el.querySelectorAll("span");
            stars.forEach(star => {
                star.style.color = star.dataset.value <= value ? "gold" : "gray";
            });
        }
        function prevSection() {
            // Logic for previous section
        }
        function nextSection() {
            // Logic for next section
        }
    </script>
</head>
<body>

    <div class="form-container">
        <h2>Survey Form</h2>

        <fieldset>
            <legend><b>Legend:</b> 1 - Waiting Time, 2 - Overall Satisfaction, 3 - Feedback</legend>

            <table>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Response</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Waiting time spent in waiting area:</td>
                    <td>
                        <label><input type="radio" name="waiting_time" value="4"> Excellent</label>
                        <label><input type="radio" name="waiting_time" value="3"> Satisfactory</label>
                        <label><input type="radio" name="waiting_time" value="2"> Needs Improvement</label>
                        <label><input type="radio" name="waiting_time" value="1"> No Opinion</label>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Overall Satisfaction (Star Rating):</td>
                    <td>
                        <div class="stars" onclick="setRating(this, event.target.dataset.value)">
                            <span data-value="1">★</span>
                            <span data-value="2">★</span>
                            <span data-value="3">★</span>
                            <span data-value="4">★</span>
                            <span data-value="5">★</span>
                        </div>
                        <input type="hidden" id="starRating" name="star_rating" value="0">
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Additional Feedback:</td>
                    <td><textarea name="feedback"></textarea></td>
                </tr>
            </table>

            <div class="btn-container">
                <button type="button" id="prevBtn" onclick="prevSection()">Previous</button>
                <button type="button" id="nextBtn" onclick="nextSection()">Next</button>
                <button type="submit" id="submitBtn" style="display: none;">Submit</button>
            </div>
        </fieldset>

    </div>

</body>
</html>
