import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'

Alpine.plugin(focus)

window.Alpine = Alpine

Alpine.store('search', {
  search_modal: false
})

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

Alpine.data('userEdit', (userFields, userId) => ({
  editing: {
    first_name: false,
    last_name: false,
    name: false,
    email: false,
    description: false
  },
  fields: userFields,
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
        console.log('User data updated successfully:', data)
      } else {
        console.error('Error:', data.message || 'Unknown error')
      }
    } catch (error) {
      console.error('Error:', error.message || error)
    }
  }
}))

Alpine.start()
