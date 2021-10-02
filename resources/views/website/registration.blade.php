<!-- section -->
<section class="innerpage">
    <div class="container container-sm">
        <p>জ্ঞানী-গুণী লোকেরা বলে গেছেন সমস্যার সঠিক চিহ্নিতকরণ সমস্যার অর্ধেক সমাধান।  তাই চলুন সকলে মিলে  সমস্যাগুলো শনাক্ত করি আর এগুলো সমাধান কিভাবে করা যায় তার কিছু সুন্দর উদাহরণ তৈরী করি।  নিচের বক্সে আপনার মূল্যবান মতামত তুলে ধরুন:</p>
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <!-- Show Error -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{url('/home/save_problem')}}" class="campaign-form">
            @csrf
            <div class="form-group">
                <input type="hidden" id="facebookId" name="facebookId" class="form-control">
                <label for="name">নাম:</label>
                <input type="text" id="name" name="name" class="form-control" aria-describedby="nameHelp">
            </div>
            <div class="form-group">
                <label for="gender">লিঙ্গ: </label>
                <select id="gender" name="gender" class="form-control">
                    <option value="">নির্বাচন করুন</option>
                    <option value="male">পুরুষ</option>
                    <option value="female">মহিলা</option>
                    <option value="other">অন্যান্য</option>
                </select>
            </div>
            <div class="form-group">
                <label for="age">বয়স:</label>
                <input type="number" id="age" name="age" class="form-control" aria-describedby="ageHelp">
            </div>
            <div class="form-group">
                <label for="occupation">পেশা:</label>
                <input type="text" id="occupation" name="occupation" class="form-control" aria-describedby="occupationHelp">
            </div>
            <div class="form-group">
                <label for="area">এলাকা:</label>
                <input type="text" id="area" name="area" class="form-control" aria-describedby="areaHelp">
            </div>
            <div class="form-group">
                <label for="ward">ওয়ার্ড:</label>
                <input type="text" id="ward" name="ward" class="form-control" aria-describedby="wardHelp">
            </div>
            <div class="form-group">
                <label for="city">ঢাকা সিটি কর্পোরেশন : </label>
                <select id="city" name="city" class="form-control">
                    <option value="">নির্বাচন করুন</option>
                    <option value="north">উত্তর</option>
                    <option value="south">দক্ষিণ </option>
                </select>
            </div>
            <div class="form-group">
                <label for="mainProblem">আপনার এলাকার মূল তিনটি সমস্যা:</label>
                <textarea id="mainProblem" name="main_problem" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="solveSuggestion">কিভাবে এই সমস্যাগুলোর সমাধান করা যায় বলে মনে করেন?</label>
                <textarea id="solveSuggestion" name="solve_suggestion" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="selfSuggestion">এই সমস্যা মোকাবেলায় আপনি নিজের কি কি ভুমিকা আছে বলে মনে করেন?</label>
                <textarea id="selfSuggestion" name="self_suggestion" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="volunteer">যদি ভলান্টিয়ার হিসেবে কাজ করার জন্য ডাকা হয় আপনি রাজি আছেন কিনা? </label>
                <select id="volunteer" name="volunteer" class="form-control">
                    <option value="">নির্বাচন করুন</option>
                    <option value="yes">হ্যা</option>
                    <option value="no">না </option>
                </select>
            </div>
            <div class="form-group">
                <label for="suggestion">প্রাণ ম্যাংগো এর মতো ব্র্যান্ড এই সমস্যা মোকাবেলায় কি ভূমিকা রাখতে পারে?</label>
                <textarea id="suggestion" name="suggestion" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">প্রেরণ করুণ</button>
        </form>
    </div>
</section>
<!-- section -->

<script>
    jQ.push(function () {
        window.addEventListener('load', function () {
            setTimeout(otherOperation, 3000);
        }, false);
        function otherOperation() {
            var id = $('#facebookId').val();
            if (!id) {
                window.location = '/';
            }
        }
    });
</script>
