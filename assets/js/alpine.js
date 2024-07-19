import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'

import Toastify from 'toastify-js'
import 'toastify-js/src/toastify.css'

Alpine.plugin(focus)

window.Alpine = Alpine

Alpine.store('search', {
  search_modal: false
})

const notify = (message, type = 'success') => {
  Toastify({
    text: message,
    duration: 1500,
    gravity: 'bottom',
    position: 'right',
    style: {
      background: type === 'success' ? '#25ac57' : '#e11d48'
    }
  }).showToast()
}

Alpine.data('searchComponent', () => ({
  searchTerm: '',
  resultes: [],
  loading: false,
  openSearchModal() {
    this.$store.search.search_modal = true
  },
  closeSearchModal() {
    this.$store.search.search_modal = false
    this.searchTerm = ''
    this.resultes = []
    this.loading = false
  },
  init() {
    document.addEventListener('keydown', e => {
      if (e.key === '/' && !this.$store.search.search_modal) {
        e.preventDefault()
        this.openSearchModal()
      }
      if (e.key === 'Escape' && this.$store.search.search_modal) {
        e.preventDefault()
        this.closeSearchModal()
      }
    })
  },
  fetchDebounced: Alpine.debounce(function () {
    if (!this.searchTerm) {
      this.resultes = []
      this.loading = false
      return
    }
    fetch(`${alpine_wp_data.rest_url}wp/v2/posts?search=${this.searchTerm}`)
      .then(res => res.json())
      .then(data => {
        this.resultes = data
        this.loading = false
      })
      .catch(error => {
        console.error('Error fetching data:', error)
        this.loading = false
      })
  }, 700), // 700ms debounce
  handleInput() {
    this.loading = true
    this.fetchDebounced()
  },
  truncateExcerpt(excerpt, words) {
    const div = document.createElement('div')
    div.innerHTML = excerpt
    const text = div.textContent || div.innerText || ''
    const truncated = text.split(' ').slice(0, words).join(' ') + '...'
    return truncated
  }
}))

// User Edit Component
Alpine.data('userEdit', (userFields, userId) => ({
  editing: {
    first_name: false,
    last_name: false,
    name: false,
    email: false,
    description: false
  },
  fields: userFields,

  notify: notify,
  async saveChanges(field) {
    try {
      let response = await fetch(`${alpine_wp_data.rest_url}wp/v2/users/${userId}`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-WP-Nonce': alpine_wp_data.nonce
        },
        body: JSON.stringify({ [field]: this.fields[field] })
      })

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`)
      }

      let data = await response.json()

      if (data.id) {
        this.editing[field] = false
        this.notify('تنظیمات با موفقیت ذخیره شدند!')
        console.log('Success:', data)
      } else {
        console.error('Error:', data.message || 'Unknown error')
        this.notify(data.message || 'Unknown error', 'error')
      }
    } catch (error) {
      console.error('Error:', error.message || error)
      this.notify(error.message || error, 'error')
    }
  }
}))

// Password Change Component
Alpine.data('passwordChange', userId => ({
  userId: userId,
  currentPassword: '',
  newPassword: '',
  confirmPassword: '',
  notify: notify,

  async changePassword() {
    if (this.newPassword !== this.confirmPassword) {
      notify('New passwords do not match', 'error')
      return
    }

    try {
      let response = await fetch(`${alpine_wp_data.rest_url}wp/v2/users/${this.userId}/change-password`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
          'X-WP-Nonce': alpine_wp_data.nonce
        },
        body: new URLSearchParams({
          id: this.userId,
          current_password: this.currentPassword,
          new_password: this.newPassword,
          confirm_password: this.confirmPassword
        })
      })

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`)
      }

      let data = await response.json()

      console.log(data)

      if (data.success) {
        this.notify('Password changed successfully! Redirecting to login page...')
        this.resetForm()

        // wait 1 second and then redirect to login page
        setTimeout(() => {
          window.location.href = alpine_wp_data.login_url
        }, 1500)
      } else {
        console.error('Error:', data.message || 'Unknown error')
        this.notify(data.message || 'Unknown error', 'error')
      }
    } catch (error) {
      console.error('Error:', error.message || error)
      this.notify(error.message || error, 'error')
    }
  },

  resetForm() {
    this.currentPassword = ''
    this.newPassword = ''
    this.confirmPassword = ''
  }
}))

// User Delete Component
Alpine.data('deleteUserAccount', userId => ({
  userId: userId,
  password: '',
  deleteAccount: false,
  notify: notify,
  deleteConfirmation: false,

  async deleteAccount() {
    try {
      let response = await fetch(`${alpine_wp_data.rest_url}wp/v2/users/${this.userId}/delete-account`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-WP-Nonce': alpine_wp_data.nonce
        },
        body: JSON.stringify({
          id: this.userId,
          password: this.password
        })
      })

      let data = await response.json()

      if (data.success) {
        this.notify('Account deleted successfully! Redirecting to login page...')

        // wait 1 second and then redirect to login page
        setTimeout(() => {
          window.location.href = alpine_wp_data.login_url
        }, 1500)
      } else {
        this.notify(data.data.message || 'Unknown error', 'error')
      }
    } catch (error) {
      console.error('Error:', error.message || error)
      this.notify(error.message || error, 'error')
    }
  }
}))

// Create Post Component
Alpine.data('createPost', () => ({
  postTitle: '',
  postContent: '',
  postCategory: [],
  notify: notify,
  async createPost() {
    try {
      let response = await fetch(`${alpine_wp_data.rest_url}wp/v2/posts`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-WP-Nonce': alpine_wp_data.nonce
        },
        body: JSON.stringify({
          title: this.postTitle,
          content: this.postContent,
          categories: this.postCategory
        })
      })

      let data = await response.json()

      if (data.id) {
        this.notify('Post created successfully!', 'success')
        this.resetForm()
      } else {
        this.notify(data.message || 'Unknown error', 'error')
      }
    } catch (error) {
      console.error('Error:', error.message || error)
      this.notify(error.message || error, 'error')
    }
  },
  resetForm() {
    this.postTitle = ''
    this.postContent = ''
    this.postCategory = []
  }
}))

// Edit Delete Post Components
Alpine.data('editDeletePost', postId => ({
  postId: postId,
  notify: notify,
  async deletePost() {
    // TODO: Remove deleted post from the DOM first then send the request
    try {
      let response = await fetch(`${alpine_wp_data.rest_url}wp/v2/posts/${this.postId}`, {
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json',
          'X-WP-Nonce': alpine_wp_data.nonce
        }
      })

      let data = await response.json()

      if (response.ok) {
        this.notify('Post deleted successfully!', 'success')
        // Reload page
        setTimeout(() => {
          window.location.reload()
        }, 1500)
      } else {
        this.notify(data.message || 'Unknown error', 'error')
      }
    } catch (error) {
      console.error('Error:', error.message || error)
      this.notify(error.message || error, 'error')
    }
  },
  async updatePost() {
    // TODO: Make this work later
  }
}))

Alpine.start()
