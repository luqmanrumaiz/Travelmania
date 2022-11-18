import logo from './logo.svg';
import './App.css';

function App() {
  return (
    <div className="App">
      <div class="background">
          <div class="shape"></div>
          <div class="shape"></div>
      </div>
      <form>
          <h3>Log in</h3>
          <p>New places await, log in to view them</p>

          <label for="email">Email address</label>
          <input type="text" id="email"/>

          <label for="password">Password</label>
          <input type="password" id="password"/>

          <button>Log In</button>
          <div class="social">
            <div class="go"><i class="fab fa-google"></i>  Google</div>
            <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
          </div>
      </form>
    </div>
  );
}

export default App;
