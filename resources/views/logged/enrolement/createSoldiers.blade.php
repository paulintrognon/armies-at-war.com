@extends('layouts.app')

@section('title')
  Création de vos soldats
@endsection

@section('page-header')
  Création de vos soldats
@endsection

@section('content')
  <form method="POST" action="{{ route('enrolement.createSoldiers.post') }}">
      {{ csrf_field() }}
      <div class="row">
        @foreach ([0, 1] as $soldierIndex)
          <div class="col-md-6">
            <div class="panel">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Soldat N°{{$soldierIndex+1}}
                </h3>
              </div>
              <div class="panel-body">
                <div class="form-group{{ $errors->has("gender[$soldierIndex]") ? ' has-error' : '' }}">
                  <div class="row">
                    <label for="gender[{{$soldierIndex}}]" class="col-md-4 control-label">Sexe</label>
                    <div class="col-md-6">
                      <select name="gender[{{$soldierIndex}}]">
                        <option value="male">Homme</option>
                        <option value="female">Femme</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group{{ $errors->has("firstName[$soldierIndex]") ? ' has-error' : '' }}">
                  <div class="row">
                    <label for="firstName[{{$soldierIndex}}]" class="col-md-4 control-label">Prénom</label>

                    <div class="col-md-6">
                      <input id="firstName[{{$soldierIndex}}]" type="text" class="form-control" name="firstName[{{$soldierIndex}}]" value="{{ old('firstName[0]') }}" required placeholder="Veuillez choisir un prénom">
                      @if ($errors->has("firstName[$soldierIndex]"))
                        <span class="help-block">
                          <strong>{{ $errors->first("firstName[$soldierIndex]") }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="form-group{{ $errors->has("lastName[$soldierIndex]") ? ' has-error' : '' }}">
                  <div class="row">
                    <label for="lastName[{{$soldierIndex}}]" class="col-md-4 control-label">Nom de famille</label>

                    <div class="col-md-6">
                      <input id="lastName[{{$soldierIndex}}]" type="text" class="form-control" name="lastName[{{$soldierIndex}}]" value="{{ old('lastName[0]') ? old('lastName[0]') : $user->name }}" required placeholder="Veuillez choisir un nom">
                      @if ($errors->has("lastName[$soldierIndex]"))
                        <span class="help-block">
                          <strong>{{ $errors->first("lastName[$soldierIndex]") }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 offset-md-4">
                    <button type="button" class="btn btn-outline btn-default" onclick="randomizeNames({{$soldierIndex}})">
                      Générer aléatoirement
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <p class="text-center">
        <input type="submit" value="À l'attaque !" class="btn btn-lg btn-primary">
      </p>
    </form>
@endsection

@push('scripts')
  <script>
  var firstNames = {
    male: [
      @if ($army->code === 'DU')
      'James', 'John', 'Robert', 'Michael', 'William', 'David', 'Richard', 'Joseph', 'Thomas', 'Charles', 'Christopher', 'Daniel', 'Matthew', 'Anthony', 'Donald', 'Mark', 'Paul', 'Steven', 'Andrew', 'Kenneth', 'George', 'Joshua', 'Kevin', 'Brian', 'Edward', 'Ronald', 'Timothy', 'Jason', 'Jeffrey', 'Ryan', 'Gary', 'Jacob', 'Nicholas', 'Eric', 'Stephen', 'Jonathan', 'Larry', 'Justin', 'Scott', 'Frank', 'Brandon', 'Raymond', 'Gregory', 'Benjamin', 'Samuel', 'Patrick', 'Alexander', 'Jack', 'Dennis', 'Jerry', 'Tyler', 'Aaron', 'Henry', 'Douglas', 'Jose', 'Peter', 'Adam', 'Zachary', 'Nathan', 'Walter', 'Harold', 'Kyle', 'Carl', 'Arthur', 'Gerald', 'Roger', 'Keith', 'Jeremy', 'Terry', 'Lawrence', 'Sean', 'Christian', 'Albert', 'Joe', 'Ethan', 'Austin', 'Jesse', 'Willie', 'Billy', 'Bryan', 'Bruce', 'Jordan', 'Ralph', 'Roy', 'Noah', 'Dylan', 'Eugene', 'Wayne', 'Alan', 'Juan', 'Louis', 'Russell', 'Gabriel', 'Randy', 'Philip', 'Harry', 'Vincent', 'Bobby', 'Johnny', 'Logan'
      @elseif ($army->code === 'EL')
      'Haruto', 'Yuto', 'Sota', 'Yuki', 'Hayato', 'Haruki', 'Ryusei', 'Koki', 'Sora', 'Sosuke', 'Riku', 'Soma', 'Ryota', 'Rui', 'Kaito', 'Haru', 'Kota', 'Yusei', 'Yuito', 'Yuma', 'Ren', 'Takumi', 'Minato', 'Eita', 'Shota', 'Daiki', 'Hiroto', 'Kosei', 'Takeru', 'Hinata', 'Lì', 'Angúo', 'Bojing', 'Chen', 'Chao', 'Bo', 'Fang', 'Gan', 'Genghis', 'Guozhi', 'Ho', 'Jian', 'Jiang', 'Jin', 'Liang', 'Manchu', 'Ming', 'Qi', 'Qiu', 'Quan', 'Quon', 'Shan', 'Shi', 'Shing', 'Tao', 'Wei', 'Xiang', 'Xin', 'Xue', 'Zhen', 'Zhong', 'Yunxu', 'Zhìxin', 'Min-jun', 'Seo-jun', 'Ha-joon', 'Do-yun', 'Joo-won', 'Ye-jun', 'Joon-woo', 'Ji-ho', 'Ji-hu', 'Jun-seo', 'Hyun-woo', 'Gun-woo', 'Kun-woo', 'Ji-hoon', 'Young-soo', 'Chia-hao', 'Chih-ming ', 'Chun-chieh', 'Chien-hung', 'Chih-chiang', 'Wen-Hsiung', 'Somchai', 'Somsak', 'Somporn', 'Somboon'
      @endif
    ],
    female: [
      @if ($army->code === 'DU')
      'Emily', 'Emma', 'Madison', 'Abigail', 'Olivia', 'Isabella', 'Hannah', 'Samantha', 'Ava', 'Ashley', 'Sophia', 'Elizabeth', 'Alexis', 'Grace', 'Sarah', 'Alyssa', 'Mia', 'Natalie', 'Chloe', 'Brianna', 'Lauren', 'Ella', 'Anna', 'Taylor', 'Kayla', 'Hailey', 'Jessica', 'Victoria', 'Jasmine', 'Sydney', 'Julia', 'Destiny', 'Morgan', 'Kaitlyn', 'Savannah', 'Katherine', 'Alexandra', 'Rachel', 'Lily', 'Megan', 'Kaylee', 'Jennifer', 'Angelina', 'Makayla', 'Allison', 'Brooke', 'Maria', 'Trinity', 'Lillian', 'Mackenzie', 'Faith', 'Sofia', 'Riley', 'Haley', 'Gabrielle', 'Nicole', 'Kylie', 'Katelyn', 'Zoe', 'Paige', 'Gabriella', 'Jenna', 'Kimberly', 'Stephanie', 'Alexa', 'Avery', 'Andrea', 'Leah', 'Madeline', 'Nevaeh', 'Evelyn', 'Maya', 'Mary', 'Michelle', 'Jada', 'Sara', 'Audrey', 'Brooklyn', 'Vanessa', 'Amanda', 'Ariana', 'Rebecca', 'Caroline', 'Amelia', 'Mariah', 'Jordan', 'Arianna', 'Isabel', 'Marissa', 'Autumn', 'Melanie', 'Aaliyah', 'Gracie', 'Claire', 'Isabelle', 'Molly', 'Mya', 'Diana', 'Katie'
      @elseif ($army->code === 'EL')
      'Seo-yun', 'Seo-yeon', 'Ji-woo', 'Ji-yoo', 'Ha-yoon', 'Seo-hyeon', 'Min-seo', 'Ha-eun', 'Ji-a', 'Da-eun', 'Ai', 'Bi', 'Cai', 'Dan', 'Fang', 'Hong', 'Hui', 'Juan', 'Lan', 'Li', 'Lian', 'Na', 'Ni', 'Qian', 'Qiong', 'Shan', 'Shu', 'Ting', 'Xia', 'Xian', 'Yan', 'Yun', 'Zhen', 'Jing', 'Ying', 'Xiaoyan', 'Xinyi', 'Jie', 'Lili', 'Xiaomei', 'Tingting', 'Yui', 'Rio', 'Yuna', 'Hina', 'Koharu', 'Hinata', 'Mei', 'Mio', 'Saki', 'Miyu', 'Kokona', 'Haruka', 'Rin', 'Akari', 'Yuna', 'Honoka', 'Momoka', 'Aoi', 'Ichika', 'Sakura', 'Himari', 'Yume', 'Airi', 'Nanami', 'Ayaka', 'Yuka', 'Riko', 'Noa', 'Mao', 'Yua', 'Ayane ', 'Hiyori', 'Misaki', 'Yuzuki', 'Rina', 'Sana', 'Ría', 'Ruka', 'Kanon', 'Kaho', 'Karin', 'Risa', 'Shiori', 'Fuka'
      @endif
    ]
  };
  var lastNames = [
    @if ($army->code === 'DU')
    'Smith', 'Johnson', 'Williams', 'Jones', 'Brown', 'Davis', 'Miller', 'Wilson', 'Moore', 'Taylor', 'Anderson', 'Thomas', 'Jackson', 'White', 'Harris', 'Martin', 'Thompson', 'Garcia', 'Martinez', 'Robinson', 'Clark', 'Rodriguez', 'Lewis', 'Lee', 'Walker', 'Hall', 'Allen', 'Young', 'Hernandez', 'King', 'Wright', 'Lopez', 'Hill', 'Scott', 'Green', 'Adams', 'Baker', 'Gonzalez', 'Nelson', 'Carter', 'Mitchell', 'Roberts', 'Turner', 'Phillips', 'Campbell', 'Parker', 'Evans', 'Edwards', 'Collins', 'Stewart', 'Sanchez', 'Morris', 'Rogers', 'Reed', 'Cook', 'Morgan', 'Bell', 'Murphy', 'Bailey', 'Rivera', 'Cooper', 'Richardson', 'Cox', 'Howard', 'Ward', 'Torres', 'Peterson', 'Gray', 'Ramirez', 'James', 'Watson', 'Brooks', 'Kelly', 'Sanders', 'Price', 'Bennett', 'Wood', 'Barnes', 'Ross', 'Henderson', 'Coleman', 'Jenkins', 'Perry', 'Powell', 'Long', 'Patterson', 'Hughes', 'Washington', 'Butler', 'Simmons', 'Foster', 'Gonzales', 'Bryant', 'Alexander', 'Russell', 'Griffin', 'Diaz', 'Myers', 'Ford', 'Hamilton', 'Graham', 'Sullivan', 'Wallace', 'West', 'Jordan', 'Owens'
    @elseif ($army->code === 'EL')
    'Wáng', 'Lǐ', 'Lee', 'Zhāng', 'Liú', 'Chén', 'Chan', 'Yáng', 'Wong', 'Zhào', 'Wú', 'Zhōu', 'Xú', 'Sūn', 'Suen', 'Mǎ', 'Zhū', 'Hú', 'Woo', 'Guō', 'Ho', 'Ko', 'Lín', 'Lam', 'Luó', 'Law', 'Satō', 'Suzuki', 'Takahashi', 'Tanaka', 'Watanabe', 'Itō', 'Nakamura', 'Kobayashi', 'Yamamoto', 'Katō', 'Yoshida', 'Yamada', 'Sasaki', 'Yamaguchi', 'Matsumoto', 'Inoue', 'Kimura', 'Shimizu', 'Hayashi', 'Saitō', 'Saitō', 'Yamazaki', 'amasaki', 'Nakajima', 'Akashima', 'Mori', 'Abe', 'Ikeda', 'Hashimoto', 'Ishikawa', 'Yamashita', 'Ogawa', 'Ishii', 'Hasegawa', 'Gotō', 'Okada', 'Kondō', 'Maeda', 'Fujita', 'Endō', 'Aoki', 'Sakamoto', 'Kim', 'Lee', 'Park', 'Choi', 'Jeong', 'Kang', 'Cho', 'Yoon', 'Jang', 'Hong', 'Yılmaz', 'Kaya', 'Demir', 'Şahin', 'Çelik', 'Yıldız', 'Öztürk', 'Aydın', 'Özdemir', 'Arslan', 'Doğan', 'Kılıç', 'Aslan', 'Çetin', 'Kara', 'Koç', 'Kurt', 'Özkan'
    @endif
  ];

  function randomizeNames(soldierIndex) {
    var gender = $('select[name="gender['+soldierIndex+']"]').val();
    var firstName = getRandomFromArray(firstNames[gender]);
    var lastName = getRandomFromArray(lastNames);
    $('input[name="firstName['+soldierIndex+']"]').val(firstName);
    $('input[name="lastName['+soldierIndex+']"]').val(lastName);
  }

  function getRandomFromArray(array) {
    return array[Math.floor(Math.random()*array.length)];
  }
  </script>
@endpush
