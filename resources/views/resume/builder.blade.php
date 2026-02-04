<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('css/restemp.css') }}">

     <link href="https://fonts.cdnfonts.com/css/freesans-2" rel="stylesheet">
     <link href="https://fonts.cdnfonts.com/css/verdana-pro-cond" rel="stylesheet">
                          
    <title>Resume template</title>
</head>
<body>
    <div style="text-align:center";>

        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
     
    <form action="{{route('resume.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <legend style="text-align:center";>ProVitae Resume</legend>
                <div class="pro-d1">
                    <h3>PERSONAL INFORMATION</h3>

                    <div class="pro-uImg">
                        <label for="image">Upload Image:</label>
                       <input type="file" id="image" name="image">
                    </div><br>

                    <div class="pro-N">
                        <label for="name">Name:</label>
                        <input type="text" placeholder="Full Name"  id="name" name="name"  value="{{ $personal->name ?? '' }}" required/>
                    </div><br>

                    <div class="pro-JT">
                        <label for="job title">Job Title:</label>
                        <input type="text" placeholder="Title" id="title" name="job_title" value="{{ $personal->job_title ?? '' }}" required/>
                    </div><br>

                    <div class="pro-SD">
                        <label for="description">Short Description:</label><br>
                        <textarea name="short_description" placeholder="Write a short description here..." id="description" required>{{ $personal->short_description ?? '' }}</textarea>
                    </div><br>

                    <div class="pro-Em">
                        <label for="email">Email:</label>
                        <input type="email" placeholder="Email ID" id="email" name="email"  value="{{ $personal->email ?? '' }}" required/>
                    </div><br>

                     <div class="pro-Pn">
                        <label for="phone">Phone No:</label>
                         <input type="number" placeholder="Phone Number" name="phone" id="phone" value="{{ $personal->phone ?? '' }}" required/>
                   </div><br>

                    <div class="pro-Lc">
                        <label for="location">Location:</label>
                        <input type="text" placeholder="Location" name="location" id="location" value="{{ $personal->location ?? '' }}" required/>
                   </div><br>

                   <div class="pro-git">
                        <label for="github">GitHub:</label>
                        <input type="text" placeholder="https://github.com/yourusername" name="github" id="github" value="{{ $personal->github ?? '' }}">
                   </div><br>
                    
                </div><br>
                    <!-- <button class="btn1" type="submit">Attach</button> -->
    
                <div class="pro-d2">
                        <h3>WORK EXPERIENCE</h3>
                        <div id="WERows">

                        </div>
                            <div class="pro-btn4">
                            <button type="button" onclick="addWERow()">ADD WORK EXPERIENCE</button>
                            </div>
                    <!-- <div class="pro-Ps">
                        <label for="position">Position:</label>
                        <input type="text" placeholder="position" name="position" id="position" required/>
                    </div><br>

                    <div class="pro-C">
                        <label for="company">Company:</label>
                        <input type="text" placeholder="company" name="company" id="company" required/>
                    </div><br>

                    <div class="pro-D">
                        <label for="from-date">From:</label>
                        <input type="date" name="from-date" id="from-date" required/>

                        <label for="to-date">To:</label>
                        <input type="date" name="to-date" id="to-date" required/> - -->

                        <!-- <input type="checkbox" placeholder="Present" name="date" id="date"/>  -->
                    <!-- </div><br>  -->

                    

                    <!-- <div class="pro-loc">
                        <label for="work location">Work Location:</label>
                        <input type="text" placeholder="Work Location" name="work_location" id="work location" />
                    </div> -->
                    
                </div><br>
                    <!-- <button class="btn2" type="submit">Attach</button> -->
  
                   <div class="pro-d3">
                    <h3>PERSONAL PROJECTS</h3>
                    <div id="rows">

                            <!-- <input type="text" name="project[]" placeholder="Project Title:">
                            
                            <textarea name="description[]" placeholder="Brief Description..."></textarea> -->
      
                    </div>
                            <div class="pro-btn">
                                <button type="button" onclick="addProjectRow()">ADD PROJECTS</button>
                            </div>
                </div>
                <!-- <button class="btn3" type="submit">Attach</button> -->
    
                <div class="pro-d4">
                    <h3>TECHNICAL SKILLS</h3>
                        <div id="Trows">

                        </div>
                            <div class="pro-btn2">
                                <button type="button" onclick="addSkillRow()">ADD SKILLS</button>
                            </div>
                </div>
                    <!-- <button class="btn4" type="submit">Attach</button> -->
   
                 <div class="pro-d5">
                    <h3>ACHIEVEMENTS</h3>

                    <div class="pro-ach">
                        <label for="achievements"></label>
                        <textarea placeholder="Major accomplishments in professional your life..." name="achievements" id="achievements"  required></textarea>
                    </div>
                </div><br>
                    <!-- <button class="btn5" type="submit">Attach</button> -->
   
                <div class="pro-d6">
                    <h3>ORGANISATIONS</h3>
                        <div class="pro-org">
                            <label for="organisations"></label>
                            <input type="text"  placeholder="Most recent employer..."  name="organisations" required>
                            <br>
                            <label for="from-date">From:</label>
                            <input type="date" name="org_from_date" required>

                            <label for="to-date">To:</label>
                            <input type="date" name="org_to_date"  required>
                        </div>
                </div>
                    <!-- <button class="btn6" type="submit">Attach</button> -->
   
                <div class="pro-d7">
                    <h3>CERTIFICATION</h3>
                    <div class="pro-crt">
                        <label for="certificates"></label>
                        <textarea placeholder="Your Credentials..." name="certifications" minlength="50" required></textarea>
                    </div>
                </div><br>
                    <!-- <button class="btn7" type="submit">Attach</button> -->
   
                <div class="pro-d8">
                    <h3>EDUCATION</h3>
                    <div id="proEdu">
                        <!-- <label for="education">Graduation/Post-Graduation/Diploma:</label>
                        <input type="text" placeholder="Course" name="education" id="education" required/>

                        <label for="education">College Name:</label>
                        <input type="text" placeholder="College Name" name="education" id="education" required/>

                        <label for="from-date">From:</label>
                        <input type="date" name="from-date" id="from-date" required>

                        <label for="to-date">To:</label>
                        <input type="date" name="to-date" id="to-date" required> -->
                    </div>
                        <div class="btn-edu">
                            <button type="button" onclick="addEduRow()">ADD EDUCATION</button>
                        </div>
                </div>
                    <!-- <button class="btn8" type="submit">Attach</button> -->
   
                <div class="pro-d9">
                    <h3>LANGUAGES</h3>
                    <div id="Lrows">

                    </div>
                        <div class="pro-btn3">
                            <button type="button" onclick="addLangRow()">ADD LANGUAGE</button>
                        </div>
                </div>
                <!-- <button class="btn9" type="submit">Attach</button> -->
    
                <button class="pro-btnS" type="submit"><span>SUBMIT</span></button>
        </fieldset>
    </div>
    </form> 
    <script>
    //====================================Work Experience section function=====================================//
    function addWERow(){
        const WERows=document.getElementById('WERows');
            const newRow=document.createElement('div');
                newRow.innerHTML=`
                                <label for="position">Position:</label>
                                <input type="text" placeholder="position" name="position[]" required/>

                                <label for="company">Company:</label>
                                <input type="text" placeholder="company" name="company[]" required/>

                                <label for="from-date">From:</label>
                                <input type="date" name="we_from_date[]" required/>

                                <label for="to-date">To:</label>
                                <input type="date" name="we_to_date[]" required/>
                                
                                <label for="work location">Work Location:</label>
                                <input type="text" placeholder="Work Location" name="work_location[]" required/>

                                <button type="button" onclick="deleteWERow(this)">DELETE</button>
                                `;
                            WERows.appendChild(newRow);
    }
   function deleteWERow(button) {
        button.parentElement.remove();
    }
    //====================================Project section function============================================//
    function addProjectRow() {
        const rows = document.getElementById('rows');
            const newRow = document.createElement('div');
                newRow.innerHTML = `
                    <input type="text" name="project[]" placeholder="Project Title:" required/>
            <br><br>
                    <textarea name="description[]" placeholder="Brief description..." required></textarea>
                <br>
                    <button type="button" onclick="deleteRow(this)">DELETE</button>
                    `;
                rows.appendChild(newRow);
    }
    
   function deleteRow(button) {
        button.parentElement.remove();
  }
    
    //========================================Skill section function===========================================================//
     function addSkillRow() {
        const Trows = document.getElementById('Trows');
            const newRow = document.createElement('div');
                newRow.innerHTML = `
                    <input type="text" name="skill[]" placeholder="Skills:" required/>
                    <button type="button" onclick="deleteSkillRow(this)">DELETE</button>
                    `;
                    Trows.appendChild(newRow);
    }
    function deleteSkillRow(button){
        button.parentElement.remove();
  }
  //===========================================Education section function=========================================================//
    function addEduRow(){
        const proEdu=document.getElementById('proEdu');
            const newRow=document.createElement('div');
                newRow.innerHTML=`
                        <label for="education">Higher-Secondary/Graduation/Post-Graduation/Diploma:</label>
                        <input type="text" placeholder="Course..." name="course[]" required/>
                    <br>
                        <label for="education">School/College/Institution:</label>
                        <input type="text" placeholder="Name..." name="institution[]" required/>
                    <br>
                        <label for="from-date">From:</label>
                        <input type="date" name="edu_from_date[]" required>

                        <label for="to-date">To:</label>
                        <input type="date" name="edu_to_date[]" required>
                    <br>
                        <button type="button" onclick="deleteEdu(this)">DELETE</button>
                        `;
                        proEdu.appendChild(newRow);
    }
    function deleteEdu(button){
        button.parentElement.remove();
    }
// ================================================Language section function========================================================//
     function addLangRow() {
        const Lrows = document.getElementById('Lrows');
            const newRow = document.createElement('div');
            
                newRow.innerHTML = `
                    <input type="text" name="language[]" placeholder="Language:" required/>
                <br>
                    <button type="button" onclick="deleteLangRow(this)">DELETE</button>
                    `;
                    Lrows.appendChild(newRow);
    }
    function deleteLangRow(button){
        button.parentElement.remove();
  }
       
  </script>
</body>
</html>