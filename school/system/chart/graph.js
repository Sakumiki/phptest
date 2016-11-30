//---------------------------------------------------------
//                   性別毎の好みのペット
// --------------------------------------------------------

function barPetGender(mDog,mCat,fDog,fCat){
var ctx = document.getElementById("barPetGender");
var myBar2Chart = new Chart(ctx, {
  //グラフの種類
  type: 'bar',
  //データの設定
  data: {
      //データ項目のラベル
      labels: ["犬", "猫"],
      //データセット
      datasets: [
          {
              //凡例
              label: "男性",
              //背景色
              backgroundColor: "rgba(18, 97, 214, 0.2)",
              //枠線の色
              borderColor: "rgba(13, 68, 149, 1)",
              //枠線の太さ
              borderWidth: 1,
              //背景色（ホバーしたときに）
              hoverBackgroundColor: "rgba(18, 97, 214, 0.4)",
              //枠線の色（ホバーしたときに）
              hoverBorderColor: "rgba(13, 68, 149, 1)",
              //グラフのデータ
              data: [mDog,mCat]
          },
          {
              //凡例
              label: "女性",
              //背景色
              backgroundColor: "rgba(255,99,132,0.2)",
              //枠線の色
              borderColor: "rgba(255,99,132,1)",
              //枠線の太さ
              borderWidth: 1,
              //背景色（ホバーしたときに）
              hoverBackgroundColor: "rgba(255,99,132,0.4)",
              //枠線の色（ホバーしたときに）
              hoverBorderColor: "rgba(255,99,132,1)",
              //グラフのデータ
              data: [fDog,fCat]
          }
      ]
  },
  //オプションの設定
  options: {
      //軸の設定
      scales: {
          //縦軸の設定
          yAxes: [{
              //目盛りの設定
              ticks: {
                  //開始値を0にする
                  beginAtZero:true,
              }
          }]
      },
      //ホバーの設定
      hover: {
          //ホバー時の動作（single, label, dataset）
          mode: 'single'
      }
  }
});
}
//---------------------------------------------------------
//                身長ごとの人数
//---------------------------------------------------------
function totalTall(){
  var ctx = document.getElementById("lineTotalTall");
  var myLine2Chart = new Chart(ctx, {
    //グラフの種類
    type: 'line',
    //データの設定
    data: {
        //データ項目のラベル
        labels: ["~130cm","~135cm","~140cm","~145cm","~150cm","~155cm","~160cm","~165cm","~170cm","~175cm","~180cm","~185cm","~190cm","~195cm","~200cm","~205cm","~210cm","~215cm","215cm~"],
        //データセット
        datasets: [
            {
                //凡例
                label: "1年目",
                //面の表示
                fill: false,
                //線のカーブ
                lineTension: 0,
                //背景色
                backgroundColor: "rgba(179,181,198,0.2)",
                //枠線の色
                borderColor: "rgba(179,181,198,1)",
                //結合点の枠線の色
                pointBorderColor: "rgba(179,181,198,1)",
                //結合点の背景色
                pointBackgroundColor: "#fff",
                //結合点のサイズ
                pointRadius: 5,
                //結合点のサイズ（ホバーしたとき）
                pointHoverRadius: 8,
                //結合点の背景色（ホバーしたとき）
                pointHoverBackgroundColor: "rgba(179,181,198,1)",
                //結合点の枠線の色（ホバーしたとき）
                pointHoverBorderColor: "rgba(220,220,220,1)",
                //結合点より外でマウスホバーを認識する範囲（ピクセル単位）
                pointHitRadius: 15,
                //グラフのデータ
                data: [12, 19, 3, 5, 2, 3]
            },
            {
                //凡例
                label: "2年目",
                //面の表示
                fill: false,
                //線のカーブ
                lineTension: 0,
                //背景色
                backgroundColor: "rgba(75,192,192,0.4)",
                //枠線の色
                borderColor: "rgba(75,192,192,1)",
                //結合点の枠線の色
                pointBorderColor: "rgba(75,192,192,1)",
                //結合点の背景色
                pointBackgroundColor: "#fff",
                //結合点のサイズ
                pointRadius: 5,
                //結合点のサイズ（ホバーしたとき）
                pointHoverRadius: 8,
                //結合点の背景色（ホバーしたとき）
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                //結合点の枠線の色（ホバーしたとき）
                pointHoverBorderColor: "rgba(220,220,220,1)",
                //結合点より外でマウスホバーを認識する範囲（ピクセル単位）
                pointHitRadius: 10,
                //グラフのデータ
                data: [15, 15, 6, 8, 5, 6]
            }
        ]
    },
    //オプションの設定
    options: {
        //軸の設定
        scales: {
            //縦軸の設定
            yAxes: [{
                //目盛りの設定
                ticks: {
                    //最小値を0にする
                    beginAtZero: true
                }
            }]
        },
        //ホバーの設定
        hover: {
            //ホバー時の動作（single, label, dataset）
            mode: 'single'
        }
    }
  });
}
//---------------------------------------------------------
//                    血液型ごとの割合
//---------------------------------------------------------
function dntBlood(a,b,o,ab){
  var ctx = document.getElementById("dntBlood");
var myDoughnutChart = new Chart(ctx, {
  //グラフの種類
  type: 'doughnut',
  //データの設定
  data: {
      //データ項目のラベル
      labels: ["A型", "B型", "O型","AB型"],
      //データセット
      datasets: [{
          //背景色
          backgroundColor: [
              "#FF6384",
              "#36A2EB",
              "#FFCE56"
          ],
          //背景色(ホバーしたとき)
          hoverBackgroundColor: [
              "#FF6384",
              "#36A2EB",
              "#FFCE56"
          ],
          //グラフのデータ
          data: [a, b, o,ab]
      }]
  },options: {
      //アニメーションの設定
      animation: {
          //アニメーションの有無
          animateRotate: false
      }
  }
});
}
//---------------------------------------------------------
//               誕生日ごとの人数
//---------------------------------------------------------
function barBirth(){
var ctx = document.getElementById("barBirth");
var myBarChart = new Chart(ctx, {
  //グラフの種類
  type: 'bar',
  //データの設定
  data: {
      //データ項目のラベル
      labels: ["1月", "2月", "3月", "4月", "5月", "6月","7月", "8月", "9月", "10月", "11月", "12月"],
      //データセット
      datasets: [{
          //凡例
          label: "人数",
          //背景色
          backgroundColor: "rgba(75,192,192,0.4)",
          //枠線の色
          borderColor: "rgba(75,192,192,1)",
          //グラフのデータ
          data: [12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3]
      }]
  },
  //オプションの設定
  options: {
      //軸の設定
      scales: {
          //縦軸の設定
          yAxes: [{
　　　　　　　　　//目盛りの設定
              ticks: {
                  //開始値を0にする
                  beginAtZero:true,
              }
          }]
      }
  }
});
}
